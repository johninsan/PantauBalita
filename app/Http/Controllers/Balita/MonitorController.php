<?php

namespace App\Http\Controllers\Balita;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Reyzeal\Fuzzy;
use App\Model\Balita\balita;
use App\Model\monitor;
use Carbon\Carbon;

class MonitorController extends Controller
{
    protected $idb;
    public function index($id)
    {
        $balitas = balita::where('id', $id)->get();
        $lahirarray = balita::where('id', $id)
            ->select('dob')->get();
        $row = count($lahirarray);
        for ($i = 0; $i < $row; $i++) {
            $lahirarray = $lahirarray[$i]->dob;
        }
        $lahir = $lahirarray;
        $date2 = Carbon::now()->toDateTimeString();
        $date1 = $lahir;

        $ts1 = strtotime($date1);
        $ts2 = strtotime($date2);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $months = (($year2 - $year1) * 12) + ($month2 - $month1);
        return view('balitas.monitor', compact('balitas', 'months'));
    }
    public function hasilmonitor($kode)
    {
        $monitors = monitor::where('kode', $kode)->get();
        return view('balitas.hasilmonitor', compact('monitors'));
    }
    public function listhasil($id)
    {
        $this->idb = $id;
        //$id = $this->idb;
        $list = balita::select(['balitas.nama', 'monitors.*'])
            ->join('monitors', 'monitors.balita_id', '=', 'balitas.id')
            ->where('balitas.id', '=', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        $bulan = $this->getMonthlyMonitorData();
        return view('balitas.listhasil', compact('list', 'bulan'));
    }

    public function getAllMonths()
    {
        $month_array = array();
        $monitors_dates = monitor::where('balita_id', $this->idb)->orderBy('created_at', 'ASC')->pluck('created_at');
        // $monitors_dates = monitor::orderBy('created_at', 'ASC')->pluck('created_at');
        $monitors_dates = json_decode($monitors_dates);
        if (!empty($monitors_dates)) {
            foreach ($monitors_dates as $unk_date) {
                $date = new \DateTime($unk_date->date);
                $month_no = $date->format('m');
                $month_name = $date->format('M');
                $month_array[$month_no] = $month_name;
            }
        }
        return $month_array;
        // return $this->getMonthlyMonitor(06);
    }
    public function getMonthlyMonitor($month)
    {
        $statusreal = monitor::select('status')
            ->whereMonth('created_at', $month)
            ->where('balita_id', $this->idb)
            ->get();
        $row = count($statusreal);
        for ($i = 0; $i < $row; $i++) {
            $statusreal = $statusreal[$i]->status;
        }
        return $statusreal;
    }

    public function getMonthlyMonitorData()
    {
        $monthly_status_array = array();
        $month_array = $this->getAllMonths();
        $month_name_array = array();
        if (!empty($month_array)) {
            foreach ($month_array as $month_no => $month_name) {
                $statusreal = $this->getMonthlyMonitor($month_no);
                array_push($monthly_status_array, $statusreal);
                array_push($month_name_array, $month_name);
            }
        }
        $monthly_status_data_array = array(
            'months' => $month_name_array,
            'status_data' => $monthly_status_array,
        );
        return $monthly_status_data_array;
    }

    public function perhitungan(Request $request)
    {
        $berat = $request->Berat;
        $months = $request->umur;
        $tinggi = $request->tinggi;
        $jk = $request->jk;
        $gb;
        $gk;
        $s;
        $gl;
        $o;
        $tahap1;
        $tahap2;
        $tahap3;
        $tahap4;
        $tahap5;
        //tahap1
        if ($months >= "12") {
            $tahap1 = 0;
        } elseif ($months <= "6") {
            $tahap1 = 1;
        } elseif ($months >= "6" && $months <= "12") {
            $tahap1 = (12 - $months) / (12 - 6);
        }
        //tahap2
        if ($months >= "24") {
            $tahap2 = 0;
        } elseif ($months <= "6") {
            $tahap2 = 0;
        } elseif ($months >= "6" && $months <= "12") {
            $tahap2 = ($months - 6) / (12 - 6);
        } elseif ($months >= "12" && $months <= "24") {
            $tahap2 = (24 - $months) / (24 - 12);
        }
        //tahap3
        if ($months >= "36") {
            $tahap3 = 0;
        } elseif ($months <= "12") {
            $tahap3 = 0;
        } elseif ($months >= "12" && $months <= "24") {
            $tahap3 = ($months - 12) / (24 - 12);
        } elseif ($months >= "24" && $months <= "36") {
            $tahap3 = (36 - $months) / (36 - 24);
        }
        //tahap 4
        if ($months >= "48") {
            $tahap4 = 0;
        } elseif ($months <= "24") {
            $tahap4 = 0;
        } elseif ($months >= "24" && $months <= "36") {
            $tahap4 = ($months - 24) / (24 - 12);
        } elseif ($months >= "36" && $months <= "48") {
            $tahap4 = (48 - $months) / (48 - 36);
        }
        //tahap 5
        if ($months >= "48" && $months <= "60") {
            $tahap5 = 1;
        } elseif ($months <= "36") {
            $tahap5 = 0;
        } elseif ($months >= "36" && $months <= "48") {
            $tahap5 = ($months - 36) / (48 - 36);
        } elseif ($months >= "60") {
            $tahap5 = 0;
        }
        $fuzzy = new Fuzzy("Gizi", "Tsukamoto");
        if ($jk == 1) {
            $fuzzy->input()->addCategory('BB')
                ->addMembership('KB', 'trapmf', [0, 0, 7, 13])
                ->addMembership('N', 'trimf', [7, 13, 19])
                ->addMembership('BL', 'trapmf', [13, 19, 28, 28]);
            $fuzzy->input()->addCategory('TB')
                ->addMembership('P', 'trapmf', [0, 0, 49, 75])
                ->addMembership('sedang', 'trimf', [49, 75, 101])
            // ->addMembership('sedang', 'trapmf', [45, 75, 90, 101])
                ->addMembership('T', 'trapmf', [75, 101, 120, 120]);
        } else {
            $fuzzy->input()->addCategory('BB')
                ->addMembership('KB', 'trapmf', [0, 0, 7, 12])
                ->addMembership('N', 'trimf', [7, 12, 18])
                ->addMembership('BL', 'trapmf', [12, 18, 26, 26]);
            $fuzzy->input()->addCategory('TB')
                ->addMembership('P', 'trapmf', [0, 0, 48, 74])
                ->addMembership('sedang', 'trimf', [48, 74, 100])
            // ->addMembership('sedang', 'trapmf', [45, 75, 90, 101])
                ->addMembership('T', 'trapmf', [74, 100, 120, 120]);
        }
        $fuzzy->output()->addCategory('gizi')
            ->addMembership('gb', 'trapmf', [0, 0, 43, 48])
            ->addMembership('gk', 'trimf', [43, 48, 53])
            ->addMembership('s', 'trimf', [48, 53, 70])
            ->addMembership('gl', 'trimf', [53, 70, 83])
            ->addMembership('o', 'trapmf', [70, 83, 123, 123]);
            //tahap 1
        if ($tahap1 != 0) {
            $fuzzy->rules()
                ->add('BB_KB AND TB_P')
                ->then('gizi_s');
            $fuzzy->rules()
                ->add('BB_KB AND TB_sedang')
                ->then('gizi_s');
            $fuzzy->rules()
                ->add('BB_KB AND TB_T')
                ->then('gizi_gk');
            $fuzzy->rules()
                ->add('BB_N AND TB_P')
                ->then('gizi_gl');
            $fuzzy->rules()
                ->add('BB_N AND TB_sedang')
                ->then('gizi_gl');
            $fuzzy->rules()
                ->add('BB_N AND TB_T')
                ->then('gizi_gl');
            $fuzzy->rules()
                ->add('BB_BL AND TB_P')
                ->then('gizi_gl');
            $fuzzy->rules()
                ->add('BB_BL AND TB_sedang')
                ->then('gizi_gl');
            $fuzzy->rules()
                ->add('BB_BL AND TB_T')
                ->then('gizi_o');
        }
        if ($tahap2 != 0) {
            //tahap 2
            $fuzzy->rules()
                ->add('BB_KB AND TB_P')
                ->then('gizi_gk');
            $fuzzy->rules()
                ->add('BB_KB AND TB_sedang')
                ->then('gizi_gk');
            $fuzzy->rules()
                ->add('BB_KB AND TB_T')
                ->then('gizi_gk');
            $fuzzy->rules()
                ->add('BB_N AND TB_P')
                ->then('gizi_s');
            $fuzzy->rules()
                ->add('BB_N AND TB_sedang')
                ->then('gizi_s');
            $fuzzy->rules()
                ->add('BB_N AND TB_T')
                ->then('gizi_s');
            $fuzzy->rules()
                ->add('BB_BL AND TB_P')
                ->then('gizi_gl');
            $fuzzy->rules()
                ->add('BB_BL AND TB_sedang')
                ->then('gizi_gl');
            $fuzzy->rules()
                ->add('BB_BL AND TB_T')
                ->then('gizi_o');
        }
         //tahap 3-----------------------------------------------------
        if ($tahap3 != 0) {
            $fuzzy->rules()
                ->add('BB_KB AND TB_P')
                ->then('gizi_gb');
            $fuzzy->rules()
                ->add('BB_KB AND TB_sedang')
                ->then('gizi_gb');
            $fuzzy->rules()
                ->add('BB_KB AND TB_T')
                ->then('gizi_gb');
            $fuzzy->rules()
                ->add('BB_N AND TB_P')
                ->then('gizi_s');
            $fuzzy->rules()
                ->add('BB_N AND TB_sedang')
                ->then('gizi_s');
            $fuzzy->rules()
                ->add('BB_N AND TB_T')
                ->then('gizi_s');
            $fuzzy->rules()
                ->add('BB_BL AND TB_P')
                ->then('gizi_gl');
            $fuzzy->rules()
                ->add('BB_BL AND TB_sedang')
                ->then('gizi_gl');
            $fuzzy->rules()
                ->add('BB_BL AND TB_T')
                ->then('gizi_o');
        }
        //tahap 4
        if ($tahap4 != 0) {
            $fuzzy->rules()
                ->add('BB_KB AND TB_P')
                ->then('gizi_gk');
            $fuzzy->rules()
                ->add('BB_KB AND TB_sedang')
                ->then('gizi_gk');
            $fuzzy->rules()
                ->add('BB_KB AND TB_T')
                ->then('gizi_gk');
            $fuzzy->rules()
                ->add('BB_N AND TB_P')
                ->then('gizi_s');
            $fuzzy->rules()
                ->add('BB_N AND TB_sedang')
                ->then('gizi_s');
            $fuzzy->rules()
                ->add('BB_N AND TB_T')
                ->then('gizi_s');
            $fuzzy->rules()
                ->add('BB_BL AND TB_P')
                ->then('gizi_gl');
            $fuzzy->rules()
                ->add('BB_BL AND TB_sedang')
                ->then('gizi_gl');
            $fuzzy->rules()
                ->add('BB_BL AND TB_T')
                ->then('gizi_s');
        }
            //tahap 5
        if ($tahap5 != 0) {
            $fuzzy->rules()
                ->add('BB_KB AND TB_P')
                ->then('gizi_gb');
            $fuzzy->rules()
                ->add('BB_KB AND TB_sedang')
                ->then('gizi_gb');
            $fuzzy->rules()
                ->add('BB_KB AND TB_T')
                ->then('gizi_gb');
            $fuzzy->rules()
                ->add('BB_N AND TB_P')
                ->then('gizi_gk');
            $fuzzy->rules()
                ->add('BB_N AND TB_sedang')
                ->then('gizi_gk');
            $fuzzy->rules()
                ->add('BB_N AND TB_T')
                ->then('gizi_gk');
            $fuzzy->rules()
                ->add('BB_BL AND TB_P')
                ->then('gizi_gl');
            $fuzzy->rules()
                ->add('BB_BL AND TB_sedang')
                ->then('gizi_gl');
            $fuzzy->rules()
                ->add('BB_BL AND TB_T')
                ->then('gizi_s');
        }
        $total = $fuzzy->calc([
            'BB' => $berat,
            'TB' => $tinggi
        ]);
        //hasil gizi
        //gb
        if ($total >= "48") {
            $gb = 0;
        } elseif ($total <= "43") {
            $gb = 1;
        } elseif ($total >= "43" && $total <= "48") {
            $gb = (48 - $total) / (48 - 43);
        }
        //gk
        if ($total >= "53") {
            $gk = 0;
        } elseif ($total <= "43") {
            $gk = 0;
        } elseif ($total >= "43" && $total <= "48") {
            $gk = ($total - 43) / (48 - 43);
        } elseif ($total >= "48" && $total <= "53") {
            $gk = (53 - $total) / (53 - 48);
        }
        //s
        if ($total >= "70") {
            $s = 0;
        } elseif ($total <= "48") {
            $s = 0;
        } elseif ($total >= "48" && $total <= "53") {
            $s = ($total - 48) / (53 - 48);
        } elseif ($total >= "53" && $total <= "70") {
            $s = (70 - $total) / (70 - 53);
        }
        //gl
        if ($total >= "83") {
            $gl = 0;
        } elseif ($total <= "53") {
            $gl = 0;
        } elseif ($total >= "53" && $total <= "70") {
            $gl = ($total - 53) / (70 - 53);
        } elseif ($total >= "70" && $total <= "83") {
            $gl = (48 - $total) / (48 - 36);
        }
        //obesitas
        if ($total >= "83" && $total <= "123") {
            $o = 1;
        } elseif ($total <= "70") {
            $o = 0;
        } elseif ($total >= "70" && $total <= "83") {
            $o = ($total - 70) / (83 - 70);
        } elseif ($total >= "123") {
            $o = 0;
        }
        // return $total;
        $monitor = new monitor();
        $kode = str_random(30);
        $monitor->balita_id = $request->balita_id;
        $monitor->kode = $kode;
        $file = $request->file('foto');
        if (empty($file)) {
            $monitor->urlfoto = null;
            $monitor->foto = null;
        } else {
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000, 1001238912) . "." . $ext;
            $file->move('uploads/foto/', $newName);
            $monitor->foto = $newName;
            $urlfoto = url('uploads/foto/') . $newName;
            $monitor->urlfoto = $urlfoto;
        }
        $monitor->jk = $jk;
        $monitor->beratbadan = $berat;
        $monitor->rw_id = $request->rw_id;
        $monitor->umur = $months;
        $monitor->tinggi = $tinggi;
        $monitor->hasil = $total;
        if ($gb > $gk) {
            $monitor->status = 1;
        } elseif ($gk > $gb && $gk > $s) {
            $monitor->status = 2;
        } elseif ($s > $gk && $s > $gl) {
            $monitor->status = 3;
        } elseif ($gl > $s && $gl > $o) {
            $monitor->status = 4;
        } elseif ($o > $gl) {
            $monitor->status = 5;
        }
        $monitor->save();
        return redirect(route('hasilmonitor', ['kode' => $kode]));
        //return view('balitas.hasilmonitor', compact('total'));
    }
}

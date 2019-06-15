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
    public function index($id)
    {
        $balitas = balita::where('id', $id)->get();
        return view('balitas.monitor', compact('balitas'));
    }
    public function hasilmonitor($kode)
    {
        $monitors = monitor::where('kode', $kode)->get();
        return view('balitas.hasilmonitor', compact('monitors'));
    }
    public function listhasil($id)
    {
        $list = balita::select(['balitas.nama', 'monitors.*'])
            ->join('monitors', 'monitors.balita_id', '=', 'balitas.id')
            ->where('balitas.id', '=', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('balitas.listhasil', compact('list'));
    }

    public function perhitungan(Request $request)
    {
        $berat = $request->Berat;
        $months = $request->umur;
        $jk = $request->jk;
        $lahir = $request->dob;
        // $current_date_time = Carbon::now()->toDateTimeString();
        // $diff = abs(strtotime($current_date_time) - strtotime($lahir));
        // $years = floor($diff / (365 * 60 * 60 * 24));
        // $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $fuzzy = new Fuzzy("Gizi", "Tsukamoto");
        $fuzzy->input()->addCategory('umur')
            ->addMembership('fase1', 'trapmf', [0, 0, 3, 6])
            ->addMembership('fase2', 'trapmf', [3, 6, 9, 12])
            ->addMembership('fase3', 'trapmf', [9, 12, 15, 18])
            ->addMembership('fase4', 'trapmf', [15, 18, 21, 24])
            ->addMembership('fase5', 'trapmf', [21, 24, 27, 30])
            ->addMembership('fase6', 'trapmf', [27, 30, 33, 36])
            ->addMembership('fase7', 'trapmf', [33, 36, 39, 42])
            ->addMembership('fase8', 'trapmf', [39, 42, 45, 48])
            ->addMembership('fase9', 'trapmf', [45, 48, 51, 54])
            ->addMembership('fase10', 'trapmf', [51, 54, 60, 60]);
        $fuzzy->input()->addCategory('BeratBadan')
            ->addMembership('sk', 'trapmf', [0, 0, 3, 4])
            ->addMembership('kb', 'trapmf', [3, 4, 6, 7])
            ->addMembership('cb', 'trapmf', [6, 7, 9, 10])
            ->addMembership('n', 'trapmf', [9, 10, 12, 13])
            ->addMembership('bl', 'trapmf', [12, 13, 16, 18])
            ->addMembership('bo', 'trapmf', [16, 18, 28, 28]);
        $fuzzy->output()->addCategory('gizi')
            ->addMembership('gb', 'trapmf', [0, 0, 0.25, 0.30])
            ->addMembership('gk', 'trapmf', [0.25, 0.30, 0.40, 0.45])
            ->addMembership('s', 'trapmf', [0.40, 0.45, 0.55, 0.60])
            ->addMembership('gl', 'trapmf', [0.55, 0.60, 0.70, 0.75])
            ->addMembership('o', 'trapmf', [0.70, 0.75, 1, 1]);
            //fase1
        $fuzzy->rules()
            ->add('umur_fase1 AND BeratBadan_sk')
            ->then('gizi_gb');
        if ($jk == 1) {
            $fuzzy->rules()
                ->add('umur_fase1 AND BeratBadan_kb')
                ->then('gizi_gk');
            $fuzzy->rules()
                ->add('umur_fase1 AND BeratBadan_cb')
                ->then('gizi_s');
        } else {
            $fuzzy->rules()
                ->add('umur_fase1 AND BeratBadan_kb')
                ->then('gizi_s');
            $fuzzy->rules()
                ->add('umur_fase1 AND BeratBadan_cb')
                ->then('gizi_gl');
        }
        $fuzzy->rules()
            ->add('umur_fase1 AND BeratBadan_n')
            ->then('gizi_o');
        $fuzzy->rules()
            ->add('umur_fase1 AND BeratBadan_bl')
            ->then('gizi_o');
        $fuzzy->rules()
            ->add('umur_fase1 AND BeratBadan_bo')
            ->then('gizi_o');
            //fase 2
        $fuzzy->rules()
            ->add('umur_fase2 AND BeratBadan_sk')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase2 AND BeratBadan_kb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase2 AND BeratBadan_cb')
            ->then('gizi_s');
        $fuzzy->rules()
            ->add('umur_fase2 AND BeratBadan_n')
            ->then('gizi_gl');
        $fuzzy->rules()
            ->add('umur_fase2 AND BeratBadan_bl')
            ->then('gizi_o');
        $fuzzy->rules()
            ->add('umur_fase2 AND BeratBadan_bo')
            ->then('gizi_o');
            //fase 3
        $fuzzy->rules()
            ->add('umur_fase3 AND BeratBadan_sk')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase3 AND BeratBadan_kb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase3 AND BeratBadan_cb')
            ->then('gizi_gk');
        $fuzzy->rules()
            ->add('umur_fase3 AND BeratBadan_n')
            ->then('gizi_s');
        $fuzzy->rules()
            ->add('umur_fase3 AND BeratBadan_bl')
            ->then('gizi_gl');
        $fuzzy->rules()
            ->add('umur_fase3 AND BeratBadan_bo')
            ->then('gizi_o');
            //fase 4
        $fuzzy->rules()
            ->add('umur_fase4 AND BeratBadan_sk')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase4 AND BeratBadan_kb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase4 AND BeratBadan_cb')
            ->then('gizi_gk');
        $fuzzy->rules()
            ->add('umur_fase4 AND BeratBadan_n')
            ->then('gizi_s');
        $fuzzy->rules()
            ->add('umur_fase4 AND BeratBadan_bl')
            ->then('gizi_gl');
        $fuzzy->rules()
            ->add('umur_fase4 AND BeratBadan_bo')
            ->then('gizi_o');
            //fase5
        $fuzzy->rules()
            ->add('umur_fase5 AND BeratBadan_sk')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase5 AND BeratBadan_kb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase5 AND BeratBadan_cb')
            ->then('gizi_gb');
        if ($jk == 1) {
            $fuzzy->rules()
                ->add('umur_fase5 AND BeratBadan_n')
                ->then('gizi_gk');
            $fuzzy->rules()
                ->add('umur_fase5 AND BeratBadan_bl')
                ->then('gizi_s');
        } else {
            $fuzzy->rules()
                ->add('umur_fase5 AND BeratBadan_n')
                ->then('gizi_s');
            $fuzzy->rules()
                ->add('umur_fase5 AND BeratBadan_bl')
                ->then('gizi_gl');
        }
        $fuzzy->rules()
            ->add('umur_fase5 AND BeratBadan_bo')
            ->then('gizi_o');
            //fase6
        $fuzzy->rules()
            ->add('umur_fase6 AND BeratBadan_sk')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase6 AND BeratBadan_kb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase6 AND BeratBadan_cb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase6 AND BeratBadan_n')
            ->then('gizi_gk');
        $fuzzy->rules()
            ->add('umur_fase6 AND BeratBadan_bl')
            ->then('gizi_s');
        $fuzzy->rules()
            ->add('umur_fase6 AND BeratBadan_bo')
            ->then('gizi_o');
            //fase7
        $fuzzy->rules()
            ->add('umur_fase7 AND BeratBadan_sk')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase7 AND BeratBadan_kb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase7 AND BeratBadan_cb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase7 AND BeratBadan_n')
            ->then('gizi_gk');
        $fuzzy->rules()
            ->add('umur_fase7 AND BeratBadan_bl')
            ->then('gizi_s');
        $fuzzy->rules()
            ->add('umur_fase7 AND BeratBadan_bo')
            ->then('gizi_gl');
            //fase8
        $fuzzy->rules()
            ->add('umur_fase8 AND BeratBadan_sk')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase8 AND BeratBadan_kb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase8 AND BeratBadan_cb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase8 AND BeratBadan_n')
            ->then('gizi_gk');
        $fuzzy->rules()
            ->add('umur_fase8 AND BeratBadan_bl')
            ->then('gizi_s');
        $fuzzy->rules()
            ->add('umur_fase8 AND BeratBadan_bo')
            ->then('gizi_gl');
            //fase9
        $fuzzy->rules()
            ->add('umur_fase9 AND BeratBadan_sk')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase9 AND BeratBadan_kb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase9 AND BeratBadan_cb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase9 AND BeratBadan_n')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase9 AND BeratBadan_bl')
            ->then('gizi_gk');
        $fuzzy->rules()
            ->add('umur_fase9 AND BeratBadan_bo')
            ->then('gizi_s');
            //fase10
        $fuzzy->rules()
            ->add('umur_fase10 AND BeratBadan_sk')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase10 AND BeratBadan_kb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase10 AND BeratBadan_cb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase10 AND BeratBadan_n')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase10 AND BeratBadan_bl')
            ->then('gizi_gk');
        $fuzzy->rules()
            ->add('umur_fase10 AND BeratBadan_bo')
            ->then('gizi_s');
        $total = $fuzzy->calc([
            'umur' => $months,
            'BeratBadan' => $berat
        ]);
        $monitor = new monitor();
        $kode = str_random(30);
        $monitor->balita_id = $request->balita_id;
        $monitor->kode = $kode;
        $monitor->jk = $jk;
        $monitor->beratbadan = $berat;
        $monitor->umur = $months;
        $monitor->hasil = $total;
        if ($total <= "0.25") {
            $monitor->gb = 1;
        } elseif ($total >= "0.25" && $total <= "0.4") {
            $monitor->gk = 1;
        } elseif ($total >= "0.4" && $total <= "0.55") {
            $monitor->s = 1;
        } elseif ($total >= "0.55" && $total <= "0.7") {
            $monitor->gl = 1;
        } elseif ($total >= "0.7") {
            $monitor->o = 1;
        }
        $monitor->save();
        return redirect(route('hasilmonitor', ['kode' => $kode]));
        //return view('balitas.hasilmonitor', compact('total'));
    }
}

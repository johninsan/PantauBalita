<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\monitor;
use App\Model\Posyandu\rw;

class GrafController extends Controller
{
    protected $rw, $moon;

    public function showgraf($rw1, $bulan1)
    {
        $this->rw = $rw1;
        $this->moon = $bulan1;
        $GB = $this->getMonthlyGBCount();
        $GK = $this->getMonthlyGKCount();
        $sehat = $this->getMonthlySehatCount();
        $GiziL = $this->getMonthlyGLCount();
        $O = $this->getMonthlyOCount();
        return view('graf.show', compact('GB', 'GK', 'sehat', 'GiziL', 'O'));
    }

    public function pilihgraf()
    {
        $rws = rw::all();
        $bulan = $this->getBulanMonitorData();
        return view('graf.graf', compact('bulan', 'rws'));
    }

    public function gizibulan(Request $request)
    {
        $rw1 = $request->rw_id;
        $bulan1 = $request->bulan;
        return redirect(route('showgraf', ['rw1' => $rw1, 'bulan1' => $bulan1]));
    }
    //menghitung status gizi
    public function getMonthlySehatCount()
    {
        $monthly_sehat = monitor::where('status', 3)->where('rw_id', $this->rw)
            ->whereMonth('created_at', $this->moon)
            ->get()->count();
        return $monthly_sehat;
    }
    public function getMonthlyGKCount()
    {
        $monthly_gk = monitor::where('status', 2)->where('rw_id', $this->rw)
            ->whereMonth('created_at', $this->moon)
            ->get()->count();
        return $monthly_gk;
    }
    public function getMonthlyGBCount()
    {
        $monthly_gb = monitor::where('status', 1)->where('rw_id', $this->rw)
            ->whereMonth('created_at', $this->moon)
            ->get()->count();
        return $monthly_gb;
    }
    public function getMonthlyGLCount()
    {
        $monthly_GL = monitor::where('status', 4)->where('rw_id', $this->rw)
            ->whereMonth('created_at', $this->moon)
            ->get()->count();
        return $monthly_GL;
    }
    public function getMonthlyOCount()
    {
        $monthly_O = monitor::where('status', 5)->where('rw_id', $this->rw)
            ->whereMonth('created_at', $this->moon)
            ->get()->count();
        return $monthly_O;
    }
//-------------------------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    public function getBulan()
    {
        $month_array = array();
        $monitors_dates = monitor::orderBy('created_at', 'ASC')->pluck('created_at');
        $monitors_dates = json_decode($monitors_dates);
        if (!empty($monitors_dates)) {
            foreach ($monitors_dates as $unk_date) {
                $date = new \DateTime($unk_date->date);
                $month_no = $date->format('m');
                $month_name = $date->format('M');
                $month_array[$month_name] = $month_no;
            }
        }
        return $month_array;
    }

    public function getBulanMonitorData()
    {
        $month_array = $this->getBulan();
        $month_name_array = array();
        if (!empty($month_array)) {
            foreach ($month_array as $month_no => $month_name) {
                array_push($month_name_array, $month_name);
            }
        }
        return $month_name_array;
    }
}

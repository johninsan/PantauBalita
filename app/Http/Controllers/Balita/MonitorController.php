<?php

namespace App\Http\Controllers\Balita;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Reyzeal\Fuzzy;
use App\Model\Balita\balita;
use App\Model\monitor;

class MonitorController extends Controller
{
    public function index($id)
    {
        $balitas = balita::where('id', $id)->get();
        return view('balitas.monitor', compact('balitas'));
    }
    public function hasilmonitor()
    {
        $monitors = monitor::all();
        return view('balitas.hasilmonitor', compact('monitors'));
    }

    public function perhitungan(Request $request)
    {
        $berat = $request->Berat;
        $umur = $request->umur;
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
            ->addMembership('kb', 'trapmf', [0, 0, 5, 7])
            ->addMembership('n', 'trapmf', [5, 7, 11, 33])
            ->addMembership('bl', 'trapmf', [11, 13, 16, 18])
            ->addMembership('bo', 'trapmf', [16, 18, 28, 28]);
        $fuzzy->output()->addCategory('gizi')
            ->addMembership('gb', 'trapmf', [0, 0, 0.25, 0.30])
            ->addMembership('gk', 'trapmf', [0.25, 0.30, 0.40, 0.45])
            ->addMembership('s', 'trapmf', [0.40, 0.45, 0.55, 0.60])
            ->addMembership('gl', 'trapmf', [0.55, 0.60, 0.70, 0.75])
            ->addMembership('o', 'trapmf', [0.70, 0.75, 1, 1]);
        $fuzzy->rules()
            ->add('umur_fase1 AND BeratBadan_kb')
            ->then('gizi_gk');
        $fuzzy->rules()
            ->add('umur_fase1 AND BeratBadan_n')
            ->then('gizi_s');
        $fuzzy->rules()
            ->add('umur_fase1 AND BeratBadan_bl')
            ->then('gizi_o');
        $fuzzy->rules()
            ->add('umur_fase1 AND BeratBadan_bo')
            ->then('gizi_o');
        $fuzzy->rules()
            ->add('umur_fase2 AND BeratBadan_kb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase2 AND BeratBadan_n')
            ->then('gizi_s');
        $fuzzy->rules()
            ->add('umur_fase2 AND BeratBadan_bl')
            ->then('gizi_o');
        $fuzzy->rules()
            ->add('umur_fase2 AND BeratBadan_bo')
            ->then('gizi_o');
        $fuzzy->rules()
            ->add('umur_fase3 AND BeratBadan_kb')
            ->then('gizi_gb');
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
            ->add('umur_fase4 AND BeratBadan_kb')
            ->then('gizi_gb');
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
            ->add('umur_fase5 AND BeratBadan_kb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase5 AND BeratBadan_n')
            ->then('gizi_gk');
        $fuzzy->rules()
            ->add('umur_fase5 AND BeratBadan_bl')
            ->then('gizi_s');
        $fuzzy->rules()
            ->add('umur_fase5 AND BeratBadan_bo')
            ->then('gizi_o');
            //fase6
        $fuzzy->rules()
            ->add('umur_fase6 AND BeratBadan_kb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase6 AND BeratBadan_n')
            ->then('gizi_gk');
        $fuzzy->rules()
            ->add('umur_fase6 AND BeratBadan_bl')
            ->then('gizi_s');
        $fuzzy->rules()
            ->add('umur_fase6 AND BeratBadan_bo')
            ->then('gizi_gl');
            //fase7
        $fuzzy->rules()
            ->add('umur_fase7 AND BeratBadan_kb')
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
            ->add('umur_fase8 AND BeratBadan_kb')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase8 AND BeratBadan_n')
            ->then('gizi_gb');
        $fuzzy->rules()
            ->add('umur_fase8 AND BeratBadan_bl')
            ->then('gizi_s');
        $fuzzy->rules()
            ->add('umur_fase8 AND BeratBadan_bo')
            ->then('gizi_gl');
            //fase9
        $fuzzy->rules()
            ->add('umur_fase9 AND BeratBadan_kb')
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
            ->add('umur_fase10 AND BeratBadan_kb')
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
            'umur' => $umur,
            'BeratBadan' => $berat
        ]);
        $monitor = new monitor();
        $monitor->balita_id = $request->balita_id;
        $monitor->beratbadan = $berat;
        $monitor->umur = $umur;
        $monitor->hasil = $total;
        $monitor->save();
        return redirect(route('hasilmonitor'));
        //return view('balitas.hasilmonitor', compact('total'));
    }
}

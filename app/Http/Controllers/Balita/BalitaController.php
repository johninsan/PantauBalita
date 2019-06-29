<?php

namespace App\Http\Controllers\Balita;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Balita\balita;
use Illuminate\Support\Facades\Auth;
use App\Model\monitor;
use Carbon\Carbon;
use App\Model\Posyandu\rw;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balitas = balita::where('user_id', Auth::user()->id)->get();
        return view('balitas.show', compact('balitas'));
    }

    public function isidata($id)
    {
        $month = Carbon::now()->format('m');
        $balitas = balita::where('id', $id)->get();
        $monitor_count = monitor::where('balita_id', $id)->whereMonth('created_at', $month)->get()->count();
        return view('balitas.balita', compact('balitas', 'monitor_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rws = rw::all();
        return view('balitas.addbalita', compact('rws'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'pob' => 'required',
            'rw_id' => 'required',
            //'tanggal_mulai' => 'required|date_format:"d-m-Y"',
            //'tanggal_berakhir' => 'required|date_format:"d-m-Y"',
        ]);
        $dob = date("Y-m-d");
        $balita = new balita;
        $balita->user_id = Auth::user()->id;
        $balita->nama = $request->nama;
        $balita->pob = $request->pob;
        $balita->rw_id = $request->rw_id;
        $file = $request->file('foto');
        if (empty($file)) {
            $balita->urlfoto = null;
            $balita->foto = null;
        } else {
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000, 1001238912) . "." . $ext;
            $file->move('uploads/foto/', $newName);
            $balita->foto = $newName;
            $urlfoto = url('uploads/foto/') . $newName;
            $balita->urlfoto = $urlfoto;
        }
        $balita->dob = $request->dob;
        $balita->JK = $request->get('jk', 0);
        $balita->save();
        return redirect(route('DaftarBalita.index'))->with('message', 'Balita berhasil didaftarkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $balita = balita::where('id', $id)->first();
        return view('balitas.editbalita', compact('balita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'pob' => 'required',
            'rw_id' => 'required',
            //'tanggal_mulai' => 'required|date_format:"d-m-Y"',
            //'tanggal_berakhir' => 'required|date_format:"d-m-Y"',
        ]);
        $dob = date("Y-m-d");
        $balita = balita::find($id);
        $balita->nama = $request->nama;
        $balita->pob = $request->pob;
        $balita->rw_id = $request->rw_id;
        if (empty($request->file('foto'))) {
            $balita->foto = $balita->foto;
        } else {
            unlink('uploads/foto/' . $balita->foto); //menghapus file lama
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000, 1001238912) . "." . $ext;
            $file->move('uploads/foto', $newName);
            $balita->foto = $newName;
        }
        $balita->dob = $request->dob;
        $balita->JK = $request->get('jk', 0);
        $balita->save();
        return redirect(route('DaftarBalita.index'))->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        balita::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }
}

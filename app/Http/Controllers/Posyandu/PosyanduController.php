<?php

namespace App\Http\Controllers\Posyandu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Posyandu\posyandu;
use App\Model\Posyandu\rw;

class PosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posyandus = posyandu::all();
        return view('posyandus.show', compact('posyandus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rws = rw::all();
        return view('posyandus.addposyandu', compact('rws'));
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
            'deskripsi' => 'required',
            'phone' => 'required',
            'rw_id' => 'required',
        ]);
        $tanggal = date("Y-m-d");
        $posyandu = new posyandu;
        $posyandu->rw_id = $request->rw_id;
        $posyandu->tanggal = $request->tanggal;
        $posyandu->deskripsi = $request->deskripsi;
        $posyandu->phone = $request->phone;
        if (empty($request->kesehatanibuanak)) {
            $posyandu->kesehatanibuanak = 0;
        } else {
            $posyandu->kesehatanibuanak = $request->kesehatanibuanak;
        }
        if (empty($request->KB)) {
            $posyandu->KB = 0;
        } else {
            $posyandu->KB = $request->KB;
        }
        if (empty($request->imun)) {
            $posyandu->imun = 0;
        } else {
            $posyandu->imun = $request->imun;
        }
        if (empty($request->diare)) {
            $posyandu->diare = 0;
        } else {
            $posyandu->diare = $request->diare;
        }
        if (empty($request->gizi)) {
            $posyandu->gizi = 0;
        } else {
            $posyandu->gizi = $request->gizi;
        }
        if (empty($request->sanitasidasar)) {
            $posyandu->sanitasidasar = 0;
        } else {
            $posyandu->sanitasidasar = $request->sanitasidasar;
        }
        if (empty($request->penyediaanobat)) {
            $posyandu->penyediaanobat = 0;
        } else {
            $posyandu->penyediaanobat = $request->penyediaanobat;
        }
        $posyandu->save();

        return redirect(route('Posyandu.index'))->with('message', 'Jadwal berhasil ditambahkan');
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
        $posyandu = posyandu::where('id', $id)->first();
        return view('posyandus.edit', compact('posyandu'));
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
            'deskripsi' => 'required',
            'phone' => 'required',
            'rw_id' => 'required',
        ]);
        $tanggal = date("Y-m-d");
        $posyandu = posyandu::find($id);
        $posyandu->rw_id = $request->rw_id;
        $posyandu->tanggal = $request->tanggal;
        $posyandu->deskripsi = $request->deskripsi;
        $posyandu->phone = $request->phone;
        if (empty($request->kesehatanibuanak)) {
            $posyandu->kesehatanibuanak = 0;
        } else {
            $posyandu->kesehatanibuanak = $request->kesehatanibuanak;
        }
        if (empty($request->KB)) {
            $posyandu->KB = 0;
        } else {
            $posyandu->KB = $request->KB;
        }
        if (empty($request->imun)) {
            $posyandu->imun = 0;
        } else {
            $posyandu->imun = $request->imun;
        }
        if (empty($request->diare)) {
            $posyandu->diare = 0;
        } else {
            $posyandu->diare = $request->diare;
        }
        if (empty($request->gizi)) {
            $posyandu->gizi = 0;
        } else {
            $posyandu->gizi = $request->gizi;
        }
        if (empty($request->sanitasidasar)) {
            $posyandu->sanitasidasar = 0;
        } else {
            $posyandu->sanitasidasar = $request->sanitasidasar;
        }
        if (empty($request->penyediaanobat)) {
            $posyandu->penyediaanobat = 0;
        } else {
            $posyandu->penyediaanobat = $request->penyediaanobat;
        }
        $posyandu->save();

        return redirect(route('Posyandu.index'))->with('message', 'Jadwal berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        posyandu::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Jadwal berhasil dihapus');
    }
}

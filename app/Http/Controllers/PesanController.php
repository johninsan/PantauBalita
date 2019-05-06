<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesan\PesanHeader;
use App\Pesan\Pesan;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;
use Illuminate\Support\Facades\DB;

class PesanController extends Controller
{
    public function getDetailMessageOrtu($kode)
    {
        $getPesan = Pesan::where('kode', $kode)->orderBy('created_at', 'desc')->get();
        return view('user.pesandetailortu', compact('getPesan'));
    }
    public function getDetailMessagePetugas($kode)
    {
        $getPesan = Pesan::where('kode', $kode)->orderBy('created_at', 'desc')->get();
        return view('pesan.pesandetailpetugas', compact('getPesan'));
    }

    public function pesanortu()
    {
        $pesan = Pesan::where('pengirim_id', Session::get('id'))->groupBy('kode')->orderBy('created_at', 'desc')->get();
        return view('user.pesanortu', compact('pesan'));
    }

    public function pesanpetugas()
    {
        $pesan = Pesan::where('penerima_id', Session::get('id'))->groupBy('kode')->orderBy('created_at', 'desc')->get();
        return view('pesan.pesanpetugas', compact('pesan'));
    }

    public function messagePost(Request $request)
    {
        $header = new PesanHeader();
        $kode = rand(123000, 560000);
        $header->kode = $kode;

        if ($header->save()) {
            $data = new Pesan();
            $data->kode = $kode;
            $data->judul = $request->judul;
            $data->pengirim_id = Session::get('id');
            $data->penerima_id = $request->idPenerima;
            $data->pesan = $request->message;
            $data->save();
            return back()->with('alert-success', '<script> window.onload = swal("Sukses!", "Pesan anda telah terkirim!", "success")</script>');
        }
    }

    public function messageReply(Request $request)
    {
        $data = new Pesan();
        $data->kode = $request->kode;
        $data->judul = $request->judul;
        $data->pengirim_id = Session::get('id');
        $data->penerima_id = $request->idPenerima;
        $data->pesan = $request->message;
        $data->save();
        return back()->with('alert-success', '<script> window.onload = swal("Sukses!", "Pesan anda telah terkirim!", "success")</script>');
    }
}

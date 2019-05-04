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
    public function pesandetailortu()
    {
        return view('user.pesandetailortu');
    }
    public function pesanortu()
    {
        $pesan = Pesan::where('pengirim_id', Session::get('id'))->groupBy('kode')->orderBy('created_at', 'desc')->get();
        // try {
        //     $pesan = DB::table('pesan')
        //         ->select('id', 'penerima_id', 'pengirim_id', 'judul', 'pesan', 'created_at', 'kode')
        //         ->where('pengirim_id', Session::get('id'))
        //         ->groupBy('kode')
        //         ->orderBy('created_at', 'desc')
        //         ->get();

        //     $data = [
        //         'pesan' => $pesan
        //     ];
        return view('user.pesanortu', compact('pesan'));

        // } catch (Exception $e) {
        //     return response($e->getMessage());
        // }
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
        $data = new modelPesan();
        $data->acara_id = $request->idAcara;
        $data->pengirim_id = Session::get('id');
        $data->penerima_id = $request->idPenerima;
        $data->kode = $request->kode;
        $data->pesan = $request->message;
        $file = $request->file('lampiran');
        if (!empty($file)) {
            $ext = $file->getClientOriginalExtension();
            $name = time() . '.' . $ext;
            $file->move('uploads/acara/', $name);
            $data->lampiran = $name;
            $data->url_lampiran = url('uploads/acara') . "/" . $name;
        } else {
            $data->lampiran = null;
            $data->url_lampiran = null;
        }
        $data->save();
        return back()->with('alert-success', '<script> window.onload = swal("Sukses!", "Pesan anda telah terkirim!", "success")</script>');
    }
}

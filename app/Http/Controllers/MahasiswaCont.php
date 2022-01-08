<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Zoom;
use App\Models\User;
use App\Models\Peminjaman;

class MahasiswaCont extends Controller
{
    public function show()
    {
        $zoomTersedia = Zoom::where('availability', 0)->count();
        $zoom = Zoom::count();
        $requestzoom = Peminjaman::where('status', 0)->count();
        $zoomDipinjam = ($zoom - $zoomTersedia);
        $user = User::count();
        return view('mahasiswa.mahasiswa', [
            'zoomTersedia' => $zoomTersedia,
            'zoomDipinjam' => $zoomDipinjam,
            'user' => $user,
            'requestzoom' => $requestzoom,
        ]);
    }

    public function ReqZoom()
    {
        $peminjaman = Peminjaman::where('status', '<=',1)->get();
        return view('mahasiswa.requestzoom', ['peminjaman' => $peminjaman]);
    }

    public function CreateReqZoom()
    {
        return view('mahasiswa.createrequestzoom');
    }

    public function InsertReqZoom(Request $request)
    {
        $availability = Zoom::where('nama_akun', $request->nama_akun)->value('availability');
        $nama_akun = Zoom::where('nama_akun', $request->nama_akun)->value('nama_akun');
        $nama_user = User::where('name', $request->nama_user)->value('name');
        if($availability == 0){
            if($request->nama_akun == $nama_akun){
                if($request->nama_user == $nama_user){
                    Peminjaman::insert([
                        'id' => $request->id_zoom,
                        'zoom_id' => Zoom::where('nama_akun', $request->nama_akun)->value('id'),
                        'user_id' => User::where('name', $request->nama_user)->value('id'),
                        'nama_kegiatan' => $request->nama_kegiatan,
                        'deskripsi' => $request->deskripsi,
                        'status' => $request->status,
                        'tanggal' => $request->tanggal,
                        'jam' => $request->jam,
                        'durasi' => $request->durasi,
                    ]);
                    
                }    
            }
        }
        return redirect('/request-zoom');
    }

    public function CancelRequest(Request $request)
    {
        Peminjaman::where('id', $request->id)->update([
            'status' => '3', //cancel
        ]);
        $_value = Peminjaman::where('id', $request->id)->value('zoom_id');
        Zoom::where('id', $_value)->update([
            'availability' => '0',
        ]);

        return redirect('/request-zoom'); 
    }

    public function DoneRequest (Request $request)
    {
        Peminjaman::where('id', $request->id)->update([
            'status' => '4', //done
        ]);
        $_value = Peminjaman::where('id', $request->id)->value('zoom_id');
        Zoom::where('id', $_value)->update([
            'availability' => '0',
        ]);

        return redirect('/request-zoom'); 
    }
    
    public function JadwalList()
    {
        $peminjaman = Peminjaman::where('status', 1)->get();
        $zoom = Zoom::where('availability', 0)->get();
        return view('mahasiswa.jadwallist', ['peminjaman' => $peminjaman, 'zoom' => $zoom]);
    }
  
    public function details($id_peminjaman) {
        
        $peminjaman = Peminjaman::where('id', $id_peminjaman)->get();
        return view('mahasiswa.detailrequestzoom', ['peminjaman' => $peminjaman]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Zoom;

class CrudZoomCont extends Controller
{
    //update data zoom
    public function update(Request $request) {
        Zoom::where('id', $request->id_zoom)->update([
            'nama_akun' => $request->nama_akun,
            'password' => $request->password,
            'kapasitas' => $request->kapasitas,
            'masa_berlaku' => $request->masa_berlaku,
        ]);
        
        return redirect('/data-akun-zoom');
    }

    // menampilkan view show
    public function show() {
        $zoom = Zoom::all();         // mengambil data dari table zoom
        return view('admin.crud-zoom.dataakunzoom', ['zoom' => $zoom]);  // mengirim data mahasiswa ke view home
    }

    //Create data ke table transaksi
    public function insert(Request $request) {
        Zoom::insert([
            'id' => $request->id_zoom,
            'nama_akun' => $request->nama_akun,
            'password' => $request->password,
            'availability' => $request->availability,
            'kapasitas' => $request->kapasitas,
            'masa_berlaku' => $request->masa_berlaku,
            

        ]);

        return redirect('/data-akun-zoom');
    }

    //delete data transaksi
    public function hapus($id_zoom) {
        
        $_value = Zoom::where('id', $id_zoom)->value('availability');
        if ($_value == 0) {
            Zoom::where('id', $id_zoom)->delete();
            return redirect('/data-akun-zoom');
        } else {
            return redirect('/data-akun-zoom');
        }
    }

    //edit data transaksi
    public function edit($id_zoom) {
        
        $zoom = Zoom::where('id', $id_zoom)->get();
        $_value = Zoom::where('id', $id_zoom)->value('availability');
        
        if ($_value == 0) {
            return view('admin.crud-zoom.update', ['zoom' => $zoom]);
        } else {
            return redirect('/data-akun-zoom');
        }
        
    }

    public function create() {
        return view('admin.crud-zoom.create');
    }
}

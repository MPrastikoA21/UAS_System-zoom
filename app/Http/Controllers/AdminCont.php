<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Zoom;

class AdminCont extends Controller
{
    public function ListJadwal()
    {
        $peminjaman = Peminjaman::where('status', 1)->get();
        return view('admin.listjadwal', ['peminjaman' => $peminjaman]);
    }

    public function HistoryPeminjaman()
    {
        $peminjaman = Peminjaman::where('status', '>',1)->get();
        return view('admin.historypeminjaman', ['peminjaman' => $peminjaman]);
    }
    
    public function DataPeminjaman()
    {
        $peminjaman = Peminjaman::where('status', 0)->get();
        return view('admin.datapeminjaman', ['peminjaman' => $peminjaman]);
    }
    
    public function DataAkunZoom()
    {
        return view('admin.crud-zoom.dataakunzoom');
    }

    public function approve($id_peminjaman) {
        
        $peminjaman = Peminjaman::where('id', $id_peminjaman)->get();
        return view('admin.approvedatapeminjaman', ['peminjaman' => $peminjaman]);
    }

    public function deny($id_peminjaman) {
        
        $peminjaman = Peminjaman::where('id', $id_peminjaman)->get();
        return view('admin.denydatapeminjaman', ['peminjaman' => $peminjaman]);
    }

    
    public function detailspeminjaman($id_peminjaman) {
        
        $peminjaman = Peminjaman::where('id', $id_peminjaman)->get();
        return view('admin.detailspeminjaman', ['peminjaman' => $peminjaman]);
    }

    public function approved(Request $request) {
        
        Peminjaman::where('id', $request->id)->update([
            'keterangan' => $request->keterangan,
            'token' => $request->token,
            'status' => '1',
            'meeting_id' => $request->meeting_id,
            'passcode' => $request->passcode,
        ]);
        Zoom::where('id', $request->zoom_id)->update([
            'availability' => '1',
        ]);
        return redirect('/data-peminjaman');
        
        
    }

    public function denied(Request $request) {
        
        Peminjaman::where('id', $request->id)->update([
            'keterangan' => $request->keterangan,
            'status' => '2',
        ]);
        Zoom::where('id', $request->zoom_id)->update([
            'availability' => '0',
        ]);
        return redirect('/data-peminjaman');
        
        
    }


}

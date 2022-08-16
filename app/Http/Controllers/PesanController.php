<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\PesananDetail;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $barang = Barang::where('id', $id)->first();

        return view('pesan.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga - $pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();

        Alert::error('Delete', 'Order has been deleted');

        return redirect('/check-out');

    } 

    public function pesan(Request $request, $id)
    {
        
        $barang = Barang::where('id', $id)->first();
        $tanggal = Carbon::now();

        $pesanan_utama = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        if(!empty($pesanan_utama))
        {
            $notif = PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
        }
      
        //validasi melebihi stok
        if($request->jumlah_pesan > $barang->stok)
        {
            return redirect('/pesan'. $id);
        }

        //cek validasi
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        //simpan pesanan ke database pesanan
        if(empty($cek_pesanan))
        {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->save();
        }
        

        //simpan ke database pesanan detail

        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        //cek pesanan detail
        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail))
        {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
        }else
        {
            $pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();

            $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;

            //harga sekarang
            $harga_pesanan_detail_baru = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update(); 
        }

        //jumlah total

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $barang->harga * $request->jumlah_pesan;
        $pesanan->update();

        $pesanan_utama = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
            if(!empty($pesanan_utama))
                {
                    $notif = PesananDetail::where('pesanan_id', $pesanan_utama->id)->count(); 
                }
        
 
        Alert::success('Success', 'Order in Cart');

        return redirect('/check-out');
    }

    public function check_out()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
 	    $pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        }
        
        return view('pesan.check_out', compact('pesanan', 'pesanan_details'));
    }

    public function konfirmasi()
    {
        // $user = User::where('user_id', Auth::user()->id)->where('status',0)->first();

        // if(empty($user->alamat))
        // {
        //     Alert::error('Error', 'Please complete your identity');
        //     return redirect('/profile');
        // }

        // if(empty($user->nohp))
        // {
        //     Alert::error('Error', 'Please complete your identity');
        //     return redirect('/profile');
        // }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        
        
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail)
        {
            $barang = Barang::where('id', $pesanan_detail->barang_id)->first();
            $barang->stok = $barang->stok - $pesanan_detail->jumlah;
            $barang->update();
        }
        

        Alert::success('Success', 'Order Success');

        return redirect('history/'.$pesanan_id);
    }
}

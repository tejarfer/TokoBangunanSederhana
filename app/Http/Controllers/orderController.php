<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\order;

class orderController extends Controller
{
    //
    public function index(Request $request){
        $search = $request->Search;
        $data = order::with('barang')
        ->where('tglOrder', 'LIKE', '%'.$search.'%')
        ->orwhere('namaPembeli', 'LIKE', '%'.$search.'%')
        ->orwhere('noTelepon', 'LIKE', '%'.$search.'%')
        ->orwhere('alamat', 'LIKE', '%'.$search.'%')
        ->orwhere('jumlahOrder', 'LIKE', '%'.$search.'%')
        ->orwhere('keterangan', 'LIKE', '%'.$search.'%')
        ->orwherehas('barang', function($query) use($search){
            $query->where('namaBrg', 'LIKE', '%'.$search.'%');
        })
        ->paginate(10);
        return view('order.index', ['dataOrder' => $data]);
    }

    public function create($id){
        $data = barang::find($id);
        return view('order.create',compact('data'));
    }

    public function store(Request $request, $id){
        $data = new order;
        $dataBarang = barang::find($id);
       
        $data->tglOrder = $request->Tanggal_Order;
        $data->namaPembeli = $request->Nama;
        $data->noTelepon = $request->No_Telepon;
        $data->alamat = $request->Alamat;
        $data->barangId = $dataBarang->id;
        $data->jumlahOrder = $request->Jumlah_Order;
        $data->keterangan = 'Menunggu Konfirmasi';
        $data->save();
        return redirect('/tampil-penjualan');
    }

    public function konfirmasi($id){
        $dataOrder = order::find($id);
        $dataBarang = barang::find($dataOrder->barangId);
        $keterangan = 'order dikonfirmasi';
        $dataOrder->keterangan = $keterangan;

        $stok_awal = $dataBarang->qty;
        $jumlah_order = $dataOrder->jumlahOrder;
        $stok_akhir = $stok_awal - $jumlah_order;
        $dataBarang->qty = $stok_akhir;
        
        $dataBarang->update();
        $dataOrder->update();
        return redirect('/tampil-list-order');
    }

    public function destroy($id){
        $data = order::find($id);
        $data->delete();
        return redirect('/tampil-list-order');
    }
}

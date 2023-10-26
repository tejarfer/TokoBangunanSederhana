<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;


class barangController extends Controller
{
    //
    public function index(Request $request){
        $search = $request->Search;
        $data = barang::where('namaBrg', 'LIKE', '%'.$search.'%')
        ->orwhere('kodeBrg', 'LIKE', '%'.$search.'%')
        ->orwhere('qty', 'LIKE', '%'.$search.'%')
        ->orwhere('satuan', 'LIKE', '%'.$search.'%')
        ->orwhere('hargaJual', 'LIKE', '%'.$search.'%')
        ->orwhere('hargaPokok', 'LIKE', '%'.$search.'%')
        ->paginate(10);
        return view('barang.index', ['dataBarang' => $data]);
    }

    public function create(){
        return view('barang.create');
    }

    public function store(Request $request){
        $data = new barang;
        $data->kodeBrg = $request->Kode_Barang;
        $data->namaBrg = $request->Nama_Barang;
        $data->qty = $request->Stok;
        $data->satuan = $request->Satuan;
        $data->hargaJual = $request->Harga_Jual;
        $data->hargaPokok = $request->Harga_Pokok;
        
        $namaBaru = "";

        if($request->file('Foto_Barang')){
            $extension = $request->file('Foto_Barang')->getClientOriginalExtension();
            $namaBaru = $request->Nama_Barang.'-'.now()->timestamp.'.'.$extension;
            $request->file('Foto_Barang')->storeAs('img', $namaBaru);
        }
        
        $data->gambarBrg = $namaBaru;

        $data->save();
        return redirect('/tampil-barang');
    }

    public function edit($id){
        $data = barang::find($id);
        return view('barang.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $data = barang::find($id);
        $data->kodeBrg = $request->Kode_Barang;
        $data->namaBrg = $request->Nama_Barang;
        $data->qty = $request->Stok;
        $data->satuan = $request->Satuan;
        $data->hargaJual = $request->Harga_Jual;
        $data->hargaPokok = $request->Harga_Pokok;
        $data->update();
        return redirect('/tampil-barang');
    }

    public function destroy($id){
        $data = barang::find($id);
        $data->delete();
        return redirect('/tampil-barang');
    }

}

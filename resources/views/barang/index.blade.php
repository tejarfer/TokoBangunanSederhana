<!DOCTYPE html>
@extends('...layout.master')
@section('content')
<div class="container-fluid">
    <h2>Tabel Data Barang</h2>

    <div class="my-3  col-12 col-sm-8 col-md-4">
        <form action="" method="get">
            <div class="input-group mb3">
                <input type="text" class="form-control" name="Search" placeholder="Search">
                <button class="input-group-text">Search</button>
            </div>
        </form>
    </div>

    <a href="{{route('barang.create')}}" class="btn btn-success mb-3">Tambah Data</a>
    <table class="table table-bordered table-responsive" id="tabel">
        <thead>
            <tr>
                <th style="width:2%">No.</th>
                <th style="width:5%">Kode Barang</th>
                <th style="width:15%">Foto Barang</th>
                <th style="width:15%">Nama Barang</th>
                <th style="width:5%">Stok</th>
                <th style="width:8%">Satuan</th>
                <th style="width:10%">Harga Pokok</th>
                <th style="width:10%">Harga Jual</th>
                <th style="width:8%">Menu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataBarang as $data)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ $data->kodeBrg }} </td>
                <td> <img src="{{asset('storage/img/'.$data->gambarBrg)}}" width="100px"></td>
                <td> {{ $data->namaBrg }} </td>
                <td> {{ $data->qty }} </td>
                <td> {{ $data->satuan }} </td>
                <td> {{ $data->hargaPokok }} </td>
                <td> {{ $data->hargaJual }} </td>
                <td>
                <form action="{{ route('barang.destroy', $data->id)}}" method="post">@csrf
                        <a href="{{ route('barang.edit', $data->id)}}" class="btn btn-primary"><i class='bx bx-edit'></i></a>
                        <button class="btn btn-danger" onClick="return confirm('Yakin Hapus Data?')"><i class='bx bxs-trash'></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="my-5">
        {{$dataBarang->withQueryString()->links()}}
    </div>
</div>
@endsection
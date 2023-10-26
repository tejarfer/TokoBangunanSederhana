<!DOCTYPE html>
@extends('...layout.master')
@section('content')
<div class="container-fluid">
    <h2>Tabel List Order</h2>

    <div class="col-12 col-sm-8 col-md-4">
        <form action="" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="Search" placeholder="Search">
                <button class="input-group-text">Search</button>
            </div>
        </form>
    </div>

    <table class="table table-bordered table-responsive" id="tabel">
        <thead>
            <tr>
                <th style="width:2%">No.</th>
                <th style="width:10%">Tanggal Order</th>
                <th style="width:15%">Nama Pelanggan</th>
                <th style="width:15%">Alamat</th>
                <th style="width:10%">No. Telepon</th>
                <th style="width:10%">Barang Order</th>
                <th style="width:8%">Jumlah Order</th>
                <th style="width:8%">Satuan</th>
                <th style="width:10%">Keterangan</th>
                @if(Auth::check() && Auth::user()->email == 'admin@gmail.com')
                <th style="width:8%">Menu</th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach ($dataOrder as $data)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ $data->tglOrder }} </td>
                <td> {{ $data->namaPembeli }} </td>
                <td> {{ $data->noTelepon }} </td>
                <td> {{ $data->alamat }} </td>
                <td> {{ $data->barang->namaBrg }} </td>
                <td> {{ $data->jumlahOrder }} </td>
                <td> {{ $data->barang->satuan }} </td>
                <td> {{ $data->keterangan }} </td>
                @if(Auth::check() && Auth::user()->email == 'admin@gmail.com')
                <td>
                <form action="{{ route('order.destroy', $data->id)}}" method="post">@csrf
                    @if( $data->keterangan != 'order dikonfirmasi')
                        <a href="{{route('order.update', $data->id)}}" class="btn btn-success" onClick="return confirm('Konfirmasi Order?')"><i class='bx bx-check-square' ></i></a>
                    @endif
                        <button class="btn btn-danger" onClick="return confirm('Yakin Hapus Data?')"><i class='bx bxs-trash'></i></button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>

    <div class="my-5">
        {{$dataOrder->withQueryString()->links()}}
    </div>

</div>
@endsection
@extends('...layout.master')
@section('content')

<br>
<div class="container">
    <div class="row">
        <div class="col-5">
            <h4>ORDER BARANG</h4>
            <br>
            <form action="{{route('order.store', $data->id)}}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label>Tanggal Order</label>
                    <input class="form-control" type="text" name="Tanggal_Order" id="Tanggal_Order" value="<?php echo(date("Y-m-d")) ?>" />
                </div>
                <div class="form-group mb-2">
                    <label>Nama</label>
                    <input class="form-control" type="text" name="Nama" id="Nama" value="{{Auth::user()->name}}" />
                </div>
                <div class="form-group mb-2">
                    <label>Alamat</label>
                    <input class="form-control" type="text" name="Alamat" id="Alamat" />
                </div>
                <div class="form-group mb-2">
                    <label>Nomor Telepon</label>
                    <input class="form-control" type="text" name="No_Telepon" id="No_Telepon" />
                </div>
                <div class="form-group mb-2">
                    <label>Jumlah Order</label>
                    <input class="form-control" type="number" name="Jumlah_Order" id="Jumlah_Order"/>
                </div>

                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#Jumlah_Order").keyup(function(){
                            var harga = {{$data->hargaJual}};
                            var jumlah = $("#Jumlah_Order").val();

                            var total = parseInt(harga) * parseInt(jumlah);
                            $("#Total_Harga").val(total);
                        });
                    });
                </script>
                
                <div class="form-group mb-2">
                    <label>Total Harga</label>
                    <input class="form-control" type="number" name="Total_Harga" id="Total_Harga" />
                </div>
            
        </div>
            <h4>Barang Yang Dibeli :</h4>
                <table class="table table-bordered table-responsive" id="tabel">
                    <thead>
                    <tr>
                        <th style="width:15%">Foto Barang</th>
                        <th style="width:15%">Nama Barang</th>
                        <th style="width:5%">Stok</th>
                        <th style="width:10%">Satuan</th>
                        <th style="width:10%">Harga Jual</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> <img src="{{asset('storage/img/'.$data->gambarBrg)}}" width="100px"></td>
                        <td> {{ $data->namaBrg }} </td>
                        <td> {{ $data->qty }} </td>
                        <td> {{ $data->satuan }} </td>
                        <td> {{ $data->hargaJual }} </td>
                    </tr>
                    </tbody>
                </table>

            <div><button type="submit" class="btn btn-primary">Order</button>
            <a href="{{url('tampil-penjualan')}}" class="btn btn-success">Kembali</a></div>
    </div>
    </form>
</div>
@endsection

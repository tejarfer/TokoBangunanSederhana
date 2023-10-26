@extends('...layout.master')
@section('content')

<br>
<div class="container-sm">
    <h4>INPUT BARANG BARU</h4>
        <br>
            <form  class="row" action="{{route('barang.store')}}" method="POST" enctype="multipart/form-data">             
                @csrf
                <div class="col-md-2">
                    <div class="form-group mb-2">
                        <label>Kode Barang</label>
                        <input class="form-control" type="text" name="Kode_Barang" id="Kode_Barang" />
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group mb-2">
                        <label>Nama Barang</label>
                        <input class="form-control" type="text" name="Nama_Barang" id="Nama_Barang" />
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>Stok</label>
                    <input class="form-control" type="number" name="Stok" id="Stok" />
                </div>
                <div class="form-group mb-2">
                    <label>Satuan</label>
                    <input class="form-control" type="text" name="Satuan" id="Satuan" />
                </div>
                <div class="form-group mb-2">
                    <label>Harga Pokok</label>
                    <input class="form-control" type="number" name="Harga_Pokok" id="Harga_Pokok" />
                </div>
                <div class="form-group mb-2">
                    <label>Harga Jual</label>
                    <input class="form-control" type="number" name="Harga_Jual" id="Harga_Jual" />
                </div>
                <div class="form-group mb-2">
                    <label>Foto Barang</label>
                    <input type="file" class="form-control" name="Foto_Barang" id="Foto_Barang">
                </div>

                <div><button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{url('tampil-barang')}}" class="btn btn-success">Kembali</a></div>

                </div>
            </form>
</div>
@endsection

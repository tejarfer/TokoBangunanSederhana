@extends('...layout.master')
@section('content')

<br>
<div class="container-fluid">
    <div class="row"></div>
        <div class="col-md-6">
            <h4>Edit Barang</h4>
            <br>
            <form action="{{route('barang.update', $data->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Kode Barang<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="Kode_Barang" id="Kode_Barang" value="{{$data->kodeBrg}}"/>
                </div>
                <div class="form-group">
                    <label>Nama Barang<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="Nama_Barang" id="Nama_Barang" value="{{$data->namaBrg}}"/>
                </div>
                <div class="form-group">
                    <label>Kategori<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="Kategori" id="Kategori" value="{{$data->kategori}}"/>
                    
                </div>
                <div class="form-group">
                    <label>Stok<span class="text-danger">*</span></label>
                    <input class="form-control" type="number" name="Stok" id="Stok" value="{{$data->qty}}"/>
                </div>
                <div class="form-group">
                    <label>Satuan<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="Satuan" id="Satuan" value="{{$data->satuan}}"/>
                </div>
                <div class="form-group">
                    <label>Harga Jual<span class="text-danger">*</span></label>
                    <input class="form-control" type="number" name="Harga_Jual" id="Harga_Jual" value="{{$data->hargaJual}}"/>
                </div>
                <div class="form-group">
                    <label>Harga Pokok<span class="text-danger">*</span></label>
                    <input class="form-control" type="number" name="Harga_Pokok" id="Harga_Pokok" value="{{$data->hargaPokok}}"/>
                </div>
                <br>
                <div><button type="submit" class="btn btn-primary">Update</button>
                <a href="{{url('tampil-barang')}}" class="btn btn-success">Kembali</a></div>
            </form>
        </div>
    </div>
</div>
@endsection

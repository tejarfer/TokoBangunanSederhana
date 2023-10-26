@extends('...layout.master')
@section('content')

<div class="container">
    <div class="row">
        @foreach ($dataBarang as $data)
            <div class="col-3">
                <div class="card" style="padding: 20px; border-radius: 10px;">
                <img src="{{asset('storage/img/'.$data->gambarBrg)}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->namaBrg }}</h5>
                        <p class="card-text" style="color: green;">Rp. {{ $data->hargaJual }}</p>
                        <a href="{{ route('order.create', $data->id)}}" class="btn btn-primary">Order</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
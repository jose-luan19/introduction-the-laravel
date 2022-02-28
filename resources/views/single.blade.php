@extends('layouts.front')

@section('content')

    <div class="row">
        <div class="col-6">
            @if ($product->photos->count())
                <img src="{{ asset('storage/' . $product->photos->first()->image )}}" class="card-img-top" alt="">
                <div class="row" style="margin-top: 20px;">
                    @foreach ($product->photos as $photos)
                        <div class="col-5">
                            <img src="{{ asset('storage/' . $photos->image )}}" class="img-fluid" alt="">
                        </div>
                    @endforeach
                </div>
            @else
                <img src="{{ asset('assets/img/no-photo.jpg')}}" class="card-img-top" alt="">
            @endif
        </div>
        <div class="col-6">
            <div class="col-md-12">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <h3>R$ {{number_format($product->price,'2',',','.') }}</h3>
                <span>Loja: {{ $product->store->name }}</span>
            </div>
            <div class="product-add col-md-12">
                <hr>
                <form action="{{ route('cart.add') }}" method="post">
                    @csrf
                    <input type="hidden" name="product[name]" value="{{ $product->name }}">
                    <input type="hidden" name="product[price]" value="{{ $product->price }}">
                    <input type="hidden" name="product[slug]" value="{{ $product->slug }}">
                    <div class="form-group">
                        <label for="">Quantidade</label>
                        <input type="number" name="product[amount]" id="" class="form-control col-md-4" value="1">
                    </div>
                    <button type="submit" class="btn btn-lg btn-danger">Comprar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12"> <hr>{{ $product->body }}</div>
    </div>

@endsection

@extends('layout.app')

@section('content')
    <h1>Atualizar Loja</h1>

    <form action="{{route('admin.products.update',['product'=> $product->id])}}" method="post">
        
        @csrf
        @method("PUT")
        <!-- <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="_method" value="PUT"> -->

        <div class="form-group">  
            <label>Nome Loja</label>
            <input type="text" name="name" class="form-control" value="{{$product->name}}">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control" value="{{$product->description}}">
        </div>

        <div class="form-group">
            <label>Conteúdo</label>
            <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$product->body}}</textarea>
        </div>

        <div class="form-group">
            <label>Preço</label>
            <input type="text" name="price" class="form-control" value="{{$product->price}}">
        </div>

        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{$product->slug}}">
        </div>

        <div>
            <button type="submit" class="mt-3 btn btn-lg btn-success">Atualizar produto</button>
        </div>
    </form>
@endsection

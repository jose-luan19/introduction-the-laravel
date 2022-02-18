@extends('layout.app')

@section('content')
    <h1>Criar Produto</h1>

    <form action="{{route('admin.products.store')}}" method="post">
        @csrf
        <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->

        <div class="form-group">  
            <label>Nome produto</label>
            <input type="text" name="name" class="form-control mb-3">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input  type="text" name="description" class="form-control mb-3">
        </div>

        <div class="form-group">
            <label>Conteúdo</label>
            <textarea class="form-control mb-3" name="body" id="" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <label>Preço</label>
            <input type="text" name="price" class="form-control mb-3">
        </div>

        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control  mb-3">
        </div>

        <div class="form-group">
            <label>Lojas</label>
            <select name="store" class="form-control">
                @foreach ( $stores as $store)
                    
                    <option value="{{$store->id}}">{{$store->name}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" class="mt-3 btn btn-lg btn-primary">Criar produto</button>
        </div>
    </form>
@endsection

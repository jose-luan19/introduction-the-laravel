@extends('layout.app')

@section('content')

    <a href="{{route('admin.products.create')}}" class="btn btn-lg btn-success">Criar produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>
                    <a href="{{route('admin.products.edit',['product'=> $product->id])}}" class="btn btn-sm btn-secondary">Editar</a>
                    <a href="{{route('admin.products.destroy',['product'=> $product->id])}}" class="btn btn-sm btn-danger">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$product->links()}}

@endsection
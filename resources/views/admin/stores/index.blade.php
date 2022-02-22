@extends('layouts.app')

@section('content')
    @if ($store!=null)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Loja</th>
                    <th>Total de Produtos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$store->id}}</td>
                <td>{{$store->name}}</td>
                <td>{{$store->products->count()}}</td>
                <td>
                    <div class="btn-group">
                        <form action="{{route('admin.stores.destroy',['store'=> $store->id])}}" method="post">
                        <a href="{{route('admin.stores.edit',['store'=> $store->id])}}" class="btn btn-sm btn-secondary">Editar</a>
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-sm btn-danger" type="submit">Remover</button>
                        </form>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    @else
        <h1 class="text-center">Usuario(a) {{auth()->user()->name}} não possui uma loja</h1>
        <div class="text-center mt-5">
            <a href="{{route('admin.stores.create')}}" class="btn btn-lg btn-success ">Criar loja</a>
        </div>

    @endif

@endsection

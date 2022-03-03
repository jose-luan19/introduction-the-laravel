@extends('layouts.app')


@section('content')

    <a href="{{route('admin.categories.create')}}" class="btn btn-lg btn-success">Criar Categoria</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td width="30%">{{$category->id}}</td>
                    <td width="50%">{{$category->name}}</td>
                    <td>
                        <div class="btn-group">
                            <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="post">
                                <a href="{{route('admin.categories.edit', ['category' => $category->id])}}" class="btn btn-sm btn-secondary">Editar</a>
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

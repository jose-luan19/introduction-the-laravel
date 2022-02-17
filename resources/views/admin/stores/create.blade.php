@extends('layout.app')

@section('content')
    <h1>Criar Loja</h1>

    <form action="/admin/stores/store" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div>
        <label>Nome Loja</label>
        <input type="text" name="name">
    </div>
    <div>
        <label>Descrição</label>
        <input type="text" name="description">
    </div>
    <div>
        <label>Telefone</label>
        <input type="text" name="phone">
    </div>
    <div>
        <label>Celular</label>
        <input type="text" name="mobile_phone">
    </div>
    <div>
        <label>Slug</label>
        <input type="text" name="slug">
    </div>
    <div>
        <label>ususario</label>
        <select name="user">
            @foreach ( $users as $user)
                
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <div>
        <button type="submit">Criar loja</button>
    </div>
    </form>
@endsection

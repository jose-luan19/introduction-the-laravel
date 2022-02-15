<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $helloWord = 'Hello Word LUAN';
    return view('welcome', compact('helloWord'));
});

Route::get('/model', function(){
    /* Active Record*/

    // $products = \App\Product::all();

    // $user = new \App\User();//usado para salvar um novo registro

    // $user = \App\User::find(41);//usado buscar o registro pelo id, e se der um save() após esse find, ele também atualiza os novos registros desse selcionado

    // $user = \App\User::where('name', 'Adelle Prohaska')->get();//query com condições, precisa do metodo get() para que retorne uma Collection

    // $user = \App\User::paginate(10); //Paginação já com links e tudo mais

    // $user->name = 'Usuario Teste';
    // $user->email = 'email@tests.com';
    // $user->password = bcrypt('123456789asd');
    
    // return $user->save();

    /* Mass Assignment & Mass Update*/

    // $user = \App\User::create([
    //     'name'=>'Luan',
    //     'email'=>'laun@test.com',
    //     'password'=>bcrypt('asdfghjkl')
    // ]);
    // dd($user);

    // $user = \App\User::find(42);
    // $user->update([
    //     'name' => 'Jose Luan'
    // ]);
    // dd($user);

    //$user = $user->update return true or false
    //$user->update return object json

    return \App\User::all();

});
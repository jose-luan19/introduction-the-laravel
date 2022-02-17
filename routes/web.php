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

    /* Querys Join's */
    // $user = \App\User::find(5);
    // return $user->store();
    // dd($user->store());
    // dd($user->store()->count());

    // $loja = \App\Store::find(1);
    // return $loja->products; // $loja->products()->where('id',40)->get();

    /* Criar a loja para um usuario */
    // $user = \App\User::find(15);
    // $store=$user->store()->create([
    //     'name'=> 'Loja Teste',
    //     'description'=>'Loja teste de produtos',
    //     'mobile_phone'=>'XX-XXXX-XXXX',
    //     'phone'=>'XX-XXXX-XXXX',
    //     'slug'=>'loja-teste'
    // ]);
    // dd($store);

    

    /* Criar produto para uma loja */
    // $store = \App\Store::find(41);
    // $product = $store->products()->create([
    //     'name'=>'Notebook',
    //     'description'=>'Descricao Note',
    //     'body'=>'body',
    //     'price'=>10.0,
    //     'slug'=>'notebook'
    // ]);
    // dd($product);

    /* Criar uma categoria */
    // \App\Category::create([
    //     'name'=>'Game',
    //     'description'=>null,
    //     'slug'=>'game'
    // ]);

    // \App\Category::create([
    //     'name'=>'PC',
    //     'description'=>null,
    //     'slug'=>'pc'
    // ]);
    // return \App\Category::all();

    /* Adicionar um produto a uma categoria ou vice-versa */
    // $product = \App\Product::find(41);
    // $product->categories()->attach([2]);//adicionar na tabela pivô, um por vez
    // $product->categories()->sync([2,1]);//faz a sincronização na tabela, ou seja irá remover ou adicionar a partir dos id's que estão no parametro
    // $product->categories()->detach([2]);//remover na tabela pivô

    $product = \App\Product::find(41);


    // $categoria = \App\Category::find(1);
    // $categoria->products->a;

    return $product->categories;

});
Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
    Route::prefix('stores')->name('stores.')->group(function(){

        Route::get('/', 'StoreController@index')->name('index');

        Route::get('/create', 'StoreController@create')->name('create');
        
        Route::post('/store', 'StoreController@store')->name('store');
        
        Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
        
        Route::post('/update/{store}', 'StoreController@update')->name('update');
        
        Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
    });

    Route::resource('products','ProductController');
});
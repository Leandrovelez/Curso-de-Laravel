<?php

use Illuminate\Support\Facades\Route;


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

//---------- ROTAS ------
Route::get('/login', function(){
    return 'Login';
});

Route::get('/ajuda', function(){
    return 'Se vira!';
});

Route::get('/contato', function (){
    return view('site.contacts');
});

Route::get('/', function () {
    return view('welcome');
});

//Rota any funciona com qualquer requisição: post, get, etc..
Route::any('/any', function (){
    return 'Any';
});

//Rota match funciona com os métodos selecionados, nesse caso, get e post 
Route::match(['get', 'post'], '/match', function (){
    return 'match';
});

//Rota dinâmica
Route::get('/categorias/{flag}', function($flag){
    return "Produtos da categoria: {$flag}";
});

Route::get('/produtos/{idProduct?}', function($idProduct = ''){
    return "Produto(s) {$idProduct}";
    //a '?' é para definir que a rot é opcional e a variável é setada
    //com um valor padrao para não gerar erro 
});

//---------- REDIRECT ------

Route::get('/redirect2', function(){
    return 'Redirect 02';
});

//modo longo
// Route::get('redirect1', function(){
//     return Redirect('/redirect2');
// });

//modo resumido

Route::Redirect('/redirect1', '/redirect2');


// -------- VIEW --------

//melhor para views simples, estáticas, quando há lógica, é usado um controler
Route::view('/view', 'welcome');


//-------- ROTAS NOMEADAS --------

Route::get('/redirect3', function (){
    return redirect()->route('url.name');
});

Route::get('/name-url', function(){
    return 'Rota nomeada';
})->name('url.name');

Route::get('/redirectSobre', function(){
    return redirect()->route('sobre');
});

Route::get('/sobreNos', function(){
    return 'Rota nomeada de Sobre';
})->name('sobre');


//------ GRUPO DE ROTAS ------


// Route::get('/admin/dashboard', function (){
//     return 'Admin Home';
// })->middleware('auth'); //Metódo para exigir autenticação, redirecionando para  login


//Grupo de rotas com middleware
/*
Route::middleware(['auth'])->group(function(){

    //grupo com prefiro da pasta '/admin'
    Route::prefix('admin')->group(function(){

        Route::name('admin.')->group( function (){
            //chamando um controller: nomeDoController@nomeDoMetodo
            Route::get('/dashboard', 'App\Http\Controllers\Admin\TesteController@teste')->name('dashboard');
            
            Route::get('/financeiro', 'App\Http\Controllers\Admin\TesteController@teste')->name('financeiro');

            Route::get('/produtos', 'App\Http\Controllers\Admin\TesteController@teste')->name('produtos');;

            Route::get('/', 'App\Http\Controllers\Admin\TesteController@teste')->name('financeiro');; 

            Route::get('/', function(){
                return redirect()->route('admin.dashboard');
            })->name('home');
        });
    });
});
*/

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin'
],  function(){
    //chamando um controller: nomeDoController@nomeDoMetodo
    Route::get('/dashboard', 'TesteController@teste')->name('admin.dashboard');
            
    Route::get('/financeiro', 'TesteController@teste')->name('admin.financeiro');

    Route::get('/produtos', 'TesteController@teste')->name('admin.produtos');

    Route::get('/', function(){
        return redirect()->route('admin.dashboard');
    })->name('home');
});

//----------- COMANDOS ---------
/* 
PHP ARTISAN ROUTE:LIST - lista as rotas (metodo, url, name, action, midlleware)
PHP ARTISAN ROUTE:CACHE  - limpa as rotas em cache

*/

Route::group(['namespace' => 'App\Http\Controllers'], function(){

    //tudo bem a rota ser a mesma, contanto que o verbo seja diferente, nesse caso é o Post
    Route::post('products', 'ProductController@store')->name('products.store');
    Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');
    Route::get('products/create', 'ProductController@create')->name('products.create');
    Route::get('products/{id}', 'ProductController@show')->name('products.show'); 
    Route::get('products', 'ProductController@index')->name('products.index');
    
    //rota para editar (verbo put)
    Route::put('products/{id}', 'ProductController@update')->name('products.update');
    Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');
});


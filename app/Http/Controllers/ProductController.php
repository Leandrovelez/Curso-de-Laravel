<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateProductRequest;

class ProductController extends Controller
{
    public function index(){
    
        $teste = '<h2>Chegou no Controller e retornou a View</h2>';
        $testeVariavel = 123;
        $teste2 = 1;
        $teste3 = '';
        $teste4 = 'vermelho';
        $products = ['Gabinete', 'Placa-mãe', 'Processador', 'Memórias', 'Fonte'];

        return view('admin.pages.products.index', compact('teste', 'testeVariavel', 'teste2', 'teste3', 'teste4', 'products'));
    }

    public function show($id){
        return "Exibindo o produto de id {$id}";
    }

    public function create(){
        return view('admin.pages.products.create');
    }

    public function edit($id){
        return view('admin.pages.products.edit', compact('id'));//passando a variavel com o id do produto
    }

    public function update($id){
        dd("Editando o produto {$id}"); //debug
    }
    
    public function destroy($id){
        return "Deletando o produto de id {$id}";
    }
    
    /*
    @* @param App\Http\Requests\StoreUpdateProductsRequest $request
    @return \Illuminate\Http\Response 
    */

    public function store(StoreUpdateProductRequest $request){

        // $request->validate([
        //     'name' => 'required|min:3|max:255',
        //     'description' => 'nullable|min:3|max:10000',
        //     'photo' => 'required|image',
        // ]);

        dd('OK');

        //dd('Cadastrando...');
        //dd($request->only(['name', 'description']));
        //dd($request->all());
        //dd($request->name); pega o valor do name
        //dd($request->input('name', 'padrao')); // retorna o valor do input name e se for vazio, um valor default
        //dd($request->except('_token'));//retorna todos os valores eceto o token

        if($request->file('photo')->isValid()){
            //dd($request->photo->extension());
            //dd($request->file('photo')->store('products'));//armazenar o arqivo
            $nameFile = $request->name. '.'.$request->photo->extension();//nomeia o arquivo
            dd($request->file('photo')->storeAs('products', $nameFile)); //armazena o arquivo com um nome custom

            
        }
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreUpdateProductRequest;

class ProductController extends Controller
{
    public function index(){
    
        $teste = '<h2>Chegou no Controller e retornou a View</h2>';
        $testeVariavel = 123;
        $teste2 = 1;
        $teste3 = '';
        $teste4 = 'vermelho';
        $products = Product::paginate(10);

        return view('admin.pages.products.index', [
            'products' => $products,
        ]);
    }

    public function show($id){
        $product = Product::where('id', $id)->get();
        //ou
        //$product = Product::find($id);
        if(!$product){
            //return redirect()->back();
            dd($product);
        }
        return view ('admin.pages.products.show',[
            'product' => $product
        ]);

       
    }


    public function create(){
        return view('admin.pages.products.create');
    }

    public function edit($id){
        if(!$product = Product::find($id))
            return redirect()->back();

        
        return view('admin.pages.products.edit', [
            'product' => $product
        ]);//passando a variavel com o id do produto
    }

    public function update($id){
        if(!$product = Product::find($id))
            return redirect()->back();

        //$product->update()
        
        dd("Editando o produto {$id}"); //debug
    }
    
    public function destroy($id){
        if(!$product = Product::find($id))
            return redirect()->back();

        $product->delete();
        return redirect()->route('products.index');
    }
    
    /*
    @* @param App\Http\Requests\StoreUpdateProductsRequest $request
    @return \Illuminate\Http\Response 
    */

    public function store(StoreUpdateProductRequest $request){

        $data = $request->only('name', 'description', 'price');

        Product::create($data);

        return redirect('products.index');

        // $request->validate([
        //     'name' => 'required|min:3|max:255',
        //     'description' => 'nullable|min:3|max:10000',
        //     'photo' => 'required|image',
        // ]);


        //dd('Cadastrando...');
        //dd($request->only(['name', 'description']));
        //dd($request->all());
        //dd($request->name); pega o valor do name
        //dd($request->input('name', 'padrao')); // retorna o valor do input name e se for vazio, um valor default
        //dd($request->except('_token'));//retorna todos os valores eceto o token

        /*
        if($request->file('image')->isValid()){
            //dd($request->photo->extension());
            //dd($request->file('photo')->store('products'));//armazenar o arqivo
            $nameFile = $request->name. '.'.$request->photo->extension();//nomeia o arquivo
            dd($request->file('image')->storeAs('products', $nameFile)); //armazena o arquivo com um nome custom

            
        }*/
        
    }
}

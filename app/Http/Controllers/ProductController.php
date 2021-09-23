<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
    
    $products = ['product 01', 'Product 02', 'Product 03'];

        return $products;
    }

    public function show($id){
        return "Exibindo o produto de id {$id}";
    }

    public function create(){
        return 'Exibindo o form de cadastro de produtos';
    }

    public function edit($id){
        return "Form para editar o produto de id {$id}";
    }

    public function update($id){
        return "Editando o produto de id {$id}";
    }
}

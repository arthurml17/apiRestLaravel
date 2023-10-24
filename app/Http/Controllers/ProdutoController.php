<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
    }
 
    public function index()
    {
        $produtos = Produto::all();
        return response()->json(["data" => $produtos, 'status' => true], 200);
    }

    /** 
     *Store a newly created resource in storage.
     *
     *@param \Illuminate\Http\Request   $request
     *@return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if(isset($data['descricao']) && isset($data['preco']) && isset($data['quantidade']) && isset($data['marca'])){
            $produto = Produto::create($dados);
            if($produto){
                return response()->json(['data' => "Product added successfully", 'status' => true], 200);
            }else{
                return response()->json(['data' => 'Failed to create product', 'status' => false], 500);
            }
        }else{
            return response()->json(['data' => "Invalid parameters!", 'status' => false], 400);
        }
    }

    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $produto = Produto::find($id);
        $produto->update($data);
        
        if($produto){
            return response()->json(['data' => "Product updated successfully", 'status' => true], 200);
        }else{
            return response()->json(['data' => 'Failed to update product', 'status' => false], 500);
        }
    }
    
    public function show(string $id)
    {
        //
        $produto = Produto::find($id);
        if($produto){
            return response()->json(['data' => $produto, 'status' => true], 200);
        }else{
            return response()->json(['data' => 'Produto não encontrado', 'status' => false], 400);
        }
    }
    
    public function destroy(string $id)
    {
        //
        $produto = Produto::find($id);
        if($produto){
            $produto->delete();
            return response()->json(['data' => "Product deleted successfully", 'status' => true], 200);
        }else{
            return response()->json(['data' => 'Failed to delete product', 'status' => false], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
     //$products=Product::all();
        // From URL to get webpage contents.
        $fornecedor1 = $this->fetchProductAllOrById("http://616d6bdb6dacbb001794ca17.mockapi.io/devnology/brazilian_provider");
        $fornecedor2 = $this->fetchProductAllOrById("http://616d6bdb6dacbb001794ca17.mockapi.io/devnology/european_provider");
               
        $fornecedor1 = json_decode($fornecedor1, TRUE);
        $fornecedor2 = json_decode($fornecedor2, TRUE);


        $products = array_merge($fornecedor1, $fornecedor2);     
        return $products;
    }

    private function fetchProductAllOrById($url)
    {
        // Initialize a CURL session.
        $ch = curl_init();
        
        // Return Page contents.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        //grab URL and pass it to the variable.
        curl_setopt($ch, CURLOPT_URL, $url);
        
        $product = curl_exec($ch);

        return $product;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'categoria' => 'required',
            'imagem' => 'required',
            'preco' => 'required',
            'material' => 'required',
            'departamento' => 'required',
        ]);

        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($provider, $id)
    {

        $url = "http://616d6bdb6dacbb001794ca17.mockapi.io/devnology/$provider/$id";
      
        return $this->fetchProductAllOrById($url);
    }     

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Product::destroy($id);
    }

     /**
     * Search for a nome
     *
     * @param  str  $nome
     * @return \Illuminate\Http\Response
     */
    public function search($nome)
    {
        return Product::where('nome', 'like', '%'.$nome.'%')->get();
    }
}

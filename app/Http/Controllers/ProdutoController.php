<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use estoque\Produto;
use estoque\Categoria;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller {

    public function __construct()
    {
        $this->middleware('autorizador');
    }

    public function lista(){

        $produtos = Produto::all();

        return view('produto.listagem')->with('produtos', $produtos);
    }

    public function listaJson(){
        
        $produtos = Produto::all();
        
        return response()->json($produtos);
    }

    public function mostra($id){

        $produto = Produto::find($id);

        if(empty($produto)) {
            return view('produto.noExists'); 
        }

        return view('produto.detalhes')->with('p', $produto);
    }

    public function remove($id){

        $produto = Produto::find($id);
        $produto->delete();

        return redirect()->action('ProdutoController@lista');   
    }

    public function novo(){
    return view('produto.formulario')->with('categorias', Categoria::all());
    }

    public function adiciona(ProdutosRequest $request){

        Produto::create($request->all());

        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));

    }
}
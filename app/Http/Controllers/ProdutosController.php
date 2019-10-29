<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Produto;
use Validator;

class ProdutosController extends Controller
{
    public function index(){
        $produtos = Produto::orderBy('nome', 'asc')->get();
        return view('produto/index', compact('produtos'));
    }

    public function add(){
        return view('produto/create');
    }

    public function create(Request $request){
        $validation = $this->validation($request);
        if ($validation->fails()){
            return redirect()->action('ProdutosController@add')
                ->withInput()
                ->withErrors($validation);
        } else {
            if($request->hasFile('cover'))
            {
                $nomeOriginal = $request->all()['cover']->getClientOriginalName();
                $path_parts = pathinfo($nomeOriginal);
                $extensao = $path_parts['extension'];
                $imagem = $request->file('cover');
                $novoNome = rand(). '.' .$extensao;
                $dadosProduto = $request->all();
                $dadosProduto['cover'] = $novoNome;
                $imagem->move(public_path("storage/files/produtos"), $novoNome);
            }

            $produto = Produto::create($dadosProduto);

            return redirect()->action('ProdutosController@index')
                ->with(['message' => 'Produto cadastrado com sucesso!', 'messageType' => 'btn-success']);
        }
    }

    public function edit($id){
        $produto = Produto::find($id);
        if($produto) {
            return view('produto/edit', compact('produto'));
        } else {
            return redirect()->action('ProdutosController@index')
                ->with(['message' => 'Produto não encontrado!', 'messageType' => 'btn-warning']);
        }
    }

    public function update(Request $request, $id){
        $validation = $this->validation($request);
        if ($validation->fails()){
            return redirect()->action('ProdutosController@edit', $id)
                ->withInput()
                ->withErrors($validation);
        } else {
            $dadosProduto = $request->except('_token');
            if($request->hasFile('cover'))
            {
                $nomeOriginal = $request->all()['cover']->getClientOriginalName();
                $path_parts = pathinfo($nomeOriginal);
                $extensao = $path_parts['extension'];
                $imagem = $request->file('cover');
                $novoNome = rand(). '.' .$extensao;
                $dadosProduto['cover'] = $novoNome;
                $imagem->move(public_path("files/produtos"), $novoNome);
            }

            $produto = Produto::where('id', $id);
            $produto->update($dadosProduto);

            return redirect()->action('ProdutosController@index')
                ->with(['message' => 'Produto atualizado com sucesso!', 'messageType' => 'btn-success']);
        }
    }

    public function destroy($id){
        $produto = Produto::where('id', $id)->delete();
        return redirect()->action('ProdutosController@index')
            ->with(['message' => 'Produto removido com sucesso!', 'messageType' => 'btn-success']);
    }

    public function validation($request){
        $rules = [
            'nome' => 'required',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'peso_gramas' => 'required|integer',
            'cover' => 'image|max:2048'
        ];

        $messages = [
            'required' => 'Campo obrigatório',
            'numeric' => 'Este campo só aceita valores numéricos',
            'integer' => 'Este campo só aceita valores numéricos inteiros',
            'image' => 'Este campo aceita apenas imagens',
            'max' => 'Excedeu o tamanho máximo'
        ];

        return Validator::make($request->all(), $rules, $messages);
    }
}

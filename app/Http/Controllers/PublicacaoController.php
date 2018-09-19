<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Publicacao;
use App\User;
use Illuminate\Http\Request;

class PublicacaoController extends Controller
{

    private $publicacao, $user, $categoria;

    public function __construct(Publicacao $publicacao, User $user, Categoria $categoria)
    {
        $this->publicacao = $publicacao;
        $this->user = $user;
        $this->categoria = $categoria;

    }

    public function index()
    {

        /*$publicacao = $this->publicacao->all();
        return view('publicacoes.index', compact('publicacao'));*/
        $publicacao = Publicacao::where('situacao', '=', 1)->get();

        return view('publicacoes.index', ['publicacao' => $publicacao]);

    }

    public function home()
    {

        $tipousuario = auth()->user()->tipousuario;

        $publicacao = $this->publicacao;

        if ($tipousuario != 0) {

            $publicacao = $publicacao->where('publicacoes.userid', '=', auth()->user()->id)
                ->orderBy('situacao', 'asc')
                ->simplePaginate(100);

            return view('publicacoes.controle', compact('publicacao'));

        }

        $publicacao = $publicacao->orderBy('situacao', 'asc')->get();

        return view('admin.home', compact('publicacao'));

    }

    public function show()
    {
        $publicacao = Publicacao::find($id);

        return view('publicacoes.carrousel', compact('publicacao'));
    }

    public function create()
    {
        $publicacao = Publicacao::get();
        $list_user = $this->user->listUser();
        $list_categoria = $this->categoria->listCategoria();

        return view('publicacoes.create', compact('publicacao', 'list_user', 'list_categoria'));
    }

    public function store(Request $request)
    {

        $publicacao = new Publicacao;

        $publicacao->nome = $request->nome;
        $publicacao->titulo = $request->titulo;
        $publicacao->descricao = $request->descricao;
        $publicacao->userid = $request->userid;
        $publicacao->categoriaid = $request->categoriaid;

        if ($request->hasFile('arquivo')) {
            $path = $request->arquivo->store('/');
            $publicacao->arquivo = $path;
           
            $publicacao->save();
        }

        if ($request->hasFile('pdf')) {
            $path = $request->pdf->store('/');
            $publicacao->pdf = $path;
            $publicacao->save();
        }
        
        return redirect()->action('PublicacaoController@controle');

    }

    public function edit($id)
    {

        $list_user = $this->user->listUser();
        $list_categoria = $this->categoria->listCategoria();
        $publicacao = Publicacao::find($id);
        return view('publicacoes.edit', compact('publicacao', 'list_user', 'list_categoria'));

    }

    public function update(Request $request, $id)
    {
        $publicacao = Publicacao::find($id);


        if ($request->hasFile('arquivo')) {
            $path = $request->arquivo->store('/');

            $publicacao->arquivo = $path;

            $publicacao->save();
        }

        if ($request->hasFile('pdf')) {
            $path = $request->pdf->store('/');
            $publicacao->pdf = $path;
            $publicacao->save();
        }

        $publicacao->situacao = $request->situacao;
        $publicacao->categoriaid = $request->categoriaid;
        $publicacao->posicaoimagem = $request->posicaoimagem;
        $publicacao->descricao = $request->descricao;
        $publicacao->titulo = $request->titulo;
        $publicacao->nome = $request->nome;

        $publicacao->save();
        return redirect()->action('PublicacaoController@controle');

    }

    public function controle()
    {
        $tipousuario = auth()->user()->tipousuario;

        $publicacao = $this->publicacao;

        if ($tipousuario != 0) {

            $publicacao = $publicacao->where('publicacoes.userid', '=', auth()->user()->id)
                
                ->orderBy('situacao', 'asc')
                ->orderBy('created_at', 'desc');

        }

        $publicacao = $publicacao->orderBy('situacao', 'asc')
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);

        return view('publicacoes.controle', compact('publicacao'));

    }

    public function categorias()
    {

        $publicacao = $this->categoria->all();
        return view('publicacoes.categorias.index', compact('publicacao'));
    }
    public function pinturas()
    {
        //$publicacao = DB::table('publicacoes')->simplePaginate(6);

        $publicacao = Publicacao::where('categoriaid', '=', 2)->Simplepaginate(6);

        return view('publicacoes.categorias.pinturas.index', ['publicacao' => $publicacao]);

    }
    public function livros()
    {

        $publicacao = Publicacao::where('categoriaid', '=', 1)->simplePaginate(6);

        return view('publicacoes.categorias.livros.index', ['publicacao' => $publicacao]);
    }

    public function gravuras()
    {
        $publicacao = Publicacao::where('categoriaid', '=', 3)->simplePaginate(6);

        return view('publicacoes.categorias.gravuras.index', ['publicacao' => $publicacao]);
    }






    public function deletfile($name)
    {

        $publicacao = Publicacao::where('arquivo', $name)->first();
        $publicacao->arquivo = null;
        unlink(public_path('uploads/' . $name));
        $publicacao->save();
        return redirect()->back();
    }

    public function download($id)
    {

        $publicacao = Publicacao::find($id);
        $filename = $publicacao->pdf;
        return response()->download(public_path("uploads/{$filename}"));

    }

    public function destroy($id)
    {

        $publicacao = Publicacao::find($id);

        if ($publicacao->arquivo) {
            unlink(public_path('uploads/' . $publicacao->arquivo));
            $publicacao->delete();
        }
        if ($publicacao->pdf) {
            unlink(public_path('uploads/' . $publicacao->pdf));
            $publicacao->delete();
        }

        $publicacao->delete();
        return redirect()->action('PublicacaoController@controle');

    }

}

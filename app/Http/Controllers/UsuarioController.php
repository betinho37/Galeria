<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
use App\Estado;
use App\Relacao;
use Illuminate\Support\Facades\Auth;
class UsuarioController extends Controller
{
    private $usuario, $estado, $relacao;

    public function __construct(User $usuario, Estado $estado, Relacao $relacao)
    {

        $this->usuario = $usuario;
        $this->estado = $estado;
        $this->relacao = $relacao;

    }

    public function index()
    {
        $usuario = $this->usuario->all();
        return view('admin.index', compact('usuario'));
    }

    public function create()
    {

        $list_estado = $this->estado->listEstado();
        $list_relacao = $this->relacao->listRelacao();
        return view('admin.create', compact('list_estado', 'list_relacao'));

    }

    public function edit($id)

    {
        $list_estado = $this->estado->listEstado();
        $list_relacao = $this->relacao->listRelacao();
        $usuario = User::find($id);
        return view('admin.edit', compact('usuario', 'list_estado', 'list_relacao'));
    }




    public function store(Request $request)
      {
          $inputs = $request->all();

          $validator = $this->validator($inputs);

                if ($validator->fails()) {
                    return redirect('usuario/create')
                                ->withErrors($validator)
                                ->withInput();
                }

          $inputs['password'] = bcrypt($inputs['password']);


        

            $this->usuario->create($inputs);


          $credentials = $request->only('email', 'password');
          if (Auth::check()) {
                return redirect()->action('UsuarioController@index');

              } else {
                      if (Auth::attempt($credentials)) {

                      return redirect()->intended('/home');
                }
            }






      }

    public function update(Request $request, $id)

    {

         $usuario = User::find($id);
         $usuario->fill($request->all());

         if ($usuario['password'] != null){
             $usuario['password'] = bcrypt($usuario['password']);
         }
         else
         unset($usuario['password']);

         $usuario->cidade= $request->cidade;

         $usuario->save();
         return redirect()->action('UsuarioController@index');
     }

    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->back();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
}

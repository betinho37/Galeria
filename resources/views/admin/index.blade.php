@extends('layouts.app')
@section('content')

<h1 align="center" >Usuários</h1>




<div class="div1" style="padding:30px">
<a class="btn btn-primary" href="/home" >Voltar</a>

<a href="usuario/create" class="btn btn-primary" >Novo Usuário</a>

<table align="center" class="table"><p></p>
    <th>Nome</th>
    <th>Email</th>
    <th>Opcões</th>
</tr>
@foreach($usuario as $usuario)
<tr>
    <td>{{$usuario -> name }}</td>
    <td>{{$usuario -> email }}</td>
    <td><a href="{{@url('usuario').'/' . 'edit'.'/'. $usuario->id}}" class="btn btn-primary">Editar</a>

      <td><a  href="{{@url('usuario').'/destroy/'.$usuario->id.''}}" class="btn btn-danger"  onclick="return confirm('Tem certeza de que deseja excluir este item ?');" >Excluir</a></td>
</td>
    @endforeach
</table>
</div>





@endsection

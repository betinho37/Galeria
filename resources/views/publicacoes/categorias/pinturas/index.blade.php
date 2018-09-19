@extends('layouts.app')
@section('content')

<link href="{{ asset('css/customize.css') }}" rel="stylesheet">

<div  id="primary" >
  <a href="/publicacoes/categorias" class="btn btn-primary" align="cen">Voltar</a>

</div>

<div class="container marketing"  style="padding:30px">
        <div class="row">
        @foreach($publicacao as $publicacoes)
             @if($publicacoes->situacao == 1 )
                  <div class="col-lg-4">
                      <div class="thumbnail">
                         <div class="caption">
                         
                         <a href="{{asset('uploads/' . $publicacoes->arquivo)}}">
                        <img src="{{asset('uploads/' . $publicacoes->arquivo)}}"  alt="{{'uploads/' . $publicacoes->arquivo}}">
                      </a>
                  </div>
                </div>
                <div class="text-item">
                  <p >Titulo: {{$publicacoes->titulo}}</p>
                  <p>Descrição: {{$publicacoes->descricao}}</p>
                  <p>Colaborador: {{$publicacoes->nome}}</p>
                  <a href="{{asset('uploads/' . $publicacoes->arquivo)}}" download="{{asset('uploads/' . $publicacoes->arquivo)}}" class="btn btn-primary" role="button">Download</a>
                </div>
              </div>
                  @else
            @endif
          @endforeach
        </div>

                {{ $publicacao->links() }}
@endsection

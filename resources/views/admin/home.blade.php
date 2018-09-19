@extends('layouts.app')

@section('content')


<div align="center" >

    <h3>Painel de Controle</h3>
        @if (Auth::check())
        @if (Auth::user()->tipousuario == 0  )
                <a class="btn btn-primary" href="/usuario" >Usuários</a>
                <a class="btn btn-primary" href="publicacoes/controle">Publicações</a>
                <a href="publicacoes/categorias" class="btn btn-primary my-2">Visualizar Obras</a>
                      @foreach ($publicacao->slice(0, 1) as $publicacoes)
                          @if($publicacoes->situacao == 0)
                            <div class="div1" style="padding:30px">
                              <div class="alert alert-danger" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                      <strong>Algumas publicações precisam ser validadas !</strong>
                                  </div>
                                </div>
                              @else
                            @endif
                    @endforeach
                @else
                <a class="btn btn-primary" href="publicacoes/controle">Publicações</a>
                <a href="publicacoes/categorias" class="btn btn-primary my-2">Visualizar Obras</a>
        @endif
          @else
          @endif

</div>
@endsection

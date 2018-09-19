@extends('layouts.app')

@section('content')

<style type="text/css">
    select.form-control:not([size]):not([multiple]) { height:calc(2.25rem + 9px); }
  </style>




<div style="padding:70px" >

{!! Form::open(array('url' => 'publicacao/store','files'=>'true', 'enctype'=>'multipart/form-data' ,'multiple'=>true,)); !!}

{!! csrf_field() !!}

    <div  class="form-group" style="display:none;">
        {!!Form::text('userid', Auth::user()->id , ['class'=>'form-control'])!!}
     </div>

        <div class="form-group"><p></p>
            <strong>Nome:</strong><p></p>
            {!!Form::text('nome', Auth::user()->name , ['class'=>'form-control'])!!}
        </div>

            <div class="form-group"><p></p>
                <strong>Titulo:</strong><p></p>
                {!!Form::text('titulo', null, ['class'=>'form-control'])!!}
            </div>
            @if (Auth::user()->tipousuario == 0  )

            <div class="form-group">
							<strong id="cat">Categoria:</strong>
							{!!Form::select('categoriaid', $list_categoria, null, ['class'=>'form-control'])!!}
						</div>

            @else
            @endif
                <div class="form-group" >
                    <strong>Descrição</strong><p></p>
                    <textarea id="descricao" name="descricao" value="{{ old('descricao') }}" class="form-control" rows="3"></textarea>
                </div>

                    <div>
                   
                        <img id="uploadPreview" style="width:300px; height: 300;" /><p></p>
                        {!! Form::label('imagem', 'Imagem', ['class' => 'control-label']) !!}
                        <input id="arquivo" type="file" name="arquivo" onchange="PreviewImage();" />

                        <script type="text/javascript">

                            function PreviewImage() {
                                var oFReader = new FileReader();
                                oFReader.readAsDataURL(document.getElementById("arquivo").files[0]);

                                oFReader.onload = function (oFREvent) {
                                    document.getElementById("uploadPreview").src = oFREvent.target.result;
                                };
                            };

                        </script><br />
                         @if (Auth::user()->tipousuario == 0  )
                        <div >
                        {!! Form::label('pdf', 'PDF', ['class' => 'control-label']) !!}
                        {!! Form::file('pdf', ['id'=>'pdf']) !!}
                        </div>
                        @else
            @endif
                    </div><br />


                            <div align="center">
                                <button type="submit" class="btn btn-primary" id='btn-salvar'> Salvar </button>
                                <a href="/home" class="btn btn-primary">Cancelar</a>
                            </div>

{!! Form::close() !!}


</div>

<script type="text/javascript">
$(document).ready(function(){
   $("#btn-salvar").click( function(event) {
      var salvar = confirm('Sua publicação será avaliada e em breve estará disponível na Galeria');
      if (salvar){
      }else{
         event.preventDefault();
      }
   });
});
</script>

@endsection

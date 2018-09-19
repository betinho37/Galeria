@extends('layouts.app')
@section('content')

<link href="{{ asset('css/customize.css') }}" rel="stylesheet">


<div class="container marketing">
        <div class="row">
          <div class="col-lg-4">
            <a href="/publicacoes/gravuras"> <img  class="img-thumbnail" src="{{asset('uploads/gravura.jpg')}}" alt="" ></a>
            <h2 >Gravuras </h2>

          </div>
          <div class="col-lg-4">
          <a href="/publicacoes/pinturas"> <img  class="img-thumbnail" src="{{asset('uploads/pintura.jpg')}}" alt="" ></a>
            <h2>Pinturas </h2>

          </div >

          <div class="col-lg-4">
          <a href="/publicacoes/livros">  <img class="img-thumbnail" src="{{asset('uploads/livro.jpg')}}" alt="" ><a/>
            <h2 >Livros </h2>

          </div>

        </div>



        @endsection

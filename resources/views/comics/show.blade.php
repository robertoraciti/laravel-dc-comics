@extends('layouts.app')

@section('main-content')
<section class="container mt-5">
    <a href="{{ route('comics.index')}}" class="btn btn-primary">Indietro</a>
    <h1 class="my-3">
        <div class="col-12">
            {{ $comic->title}} 
        </div>
    </h1>
    <div class="row g-5">
        <div class="col-4">
            <img src="{{$comic->thumb}}" alt="" width="300">
        </div>
        <div class="col-8">
            <div class="row g-5">
                <div class="col-2">
                    <strong>Serie: </strong><br>
                    {{ $comic->series}} 
                </div>
                <div class="col-2">
                    <strong>Tipo: </strong><br>
                    {{ $comic->type}} 
                </div>
                <div class="col-2">
                    <strong>Data d'uscita: </strong><br>
                    {{ $comic->sale_date}} 
                </div>
                <div class="col-2">
                    <strong>Prezzo: </strong><br>
                    {{ $comic->price}} 
                </div>
                <div class="col-12">
                    <strong>Descrizione: </strong><br>
                    {{ $comic->description}}
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection
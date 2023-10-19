@extends('layouts.app')

@section('main-content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Modifica dati</h1>
        <a href="{{ route('comics.index')}}" class="btn btn-primary">Torna indietro</a>
    </div>
    <form action="{{ route('comics.update', $comic) }}" method="post" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $comic->title }}">
        </div>
        <div class="col-3">
            <label for="thumb" class="form-label">Copertina</label>
            <input type="url" name="thumb" id="thumb" class="form-control">
        </div>
        <div class="col-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $comic->price }}">
        </div>
        <div class="col-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" name="series" id="series" class="form-control" value="{{ $comic->series }}">
        </div>
        <div class="col-3">
            <label for="sale_date" class="form-label">Data d'uscita</label>
            <input type="date" name="sale_date" id="sale_date" class="form-control" value="{{ $comic->sale_date }}">
        </div>
        <div class="col-3">
            <label for="type" class="form-label">Tipo</label>
            <select name="type" id="type" class="form-select">
                <option value="comic book">Comic Book</option>
                <option value="graphic novel">Graphic Novel</option>
            </select>
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" class="form-control" value="{{ $comic->description }}"></textarea>
        </div>
        <div class="col-3 mt-4">
            <button class="btn btn-success">Aggiorna</button>
        </div>
    </form>
</div>
@endsection
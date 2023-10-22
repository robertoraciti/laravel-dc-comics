@extends('layouts.app')

@section('main-content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Aggiungi fumetto</h1>
        <a href="{{ route('comics.index')}}" class="btn btn-primary">Torna indietro</a>
    </div>
    <form action="{{ route('comics.store') }}" method="post" class="row g-3">
        @csrf
        <div class="col-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">

            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-3">
            <label for="thumb" class="form-label">Copertina</label>
            <input type="url" name="thumb" id="thumb" class="form-control @error('thumb') is-invalid @enderror" value="{{old('thumb')}}">
            @error('thumb')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" name="series" id="series" class="form-control @error('series') is-invalid @enderror" value="{{old('series')}}">
            @error('series')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-3">
            <label for="sale_date" class="form-label">Data d'uscita</label>
            <input type="date" name="sale_date" id="sale_date" class="form-control @error('sale_date') is-invalid @enderror" value="{{old('title')}}">
            @error('sale_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-3">
            <label for="type" class="form-label">Tipo</label>
            <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
                <option value="comic book" @if(old('tipo') == "comic book") selected @endif>Comic Book</option>
                <option value="graphic novel" @if(old('tipo') == "graphic novel") selected @endif>Graphic Novel</option>
            </select>
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}"></textarea>
        </div>
        <div class="col-3 mt-4">
            <button class="btn btn-success">Salva</button>
        </div>
    </form>
</div>
@endsection
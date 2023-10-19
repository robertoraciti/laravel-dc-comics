@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
@endsection

@section('main-content')
  <section class="container mt-5">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Lista Fumetti</h1>
        <a href="{{ route('comics.create')}}" class="btn btn-primary">Aggiungi Fumetto</a>
    </div>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Titolo</th>
            <th scope="col">Prezzo</th>
            <th scope="col">Serie</th>
            <th scope="col">Data di Vendita</th>
            <th scope="col">Tipo</th>
            <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comics as $comic)
            <tr>
                <td>{{$comic->id}}</td>
                <td>{{$comic->title}}</td>
                <td>{{$comic->price}}</td>
                <td>{{$comic->series}}</td>
                <td>{{$comic->sale_date}}</td>
                <td>{{$comic->type}}</td>
                <td>
                <a href="{{ route('comics.show', $comic) }}">
                    <i class="fa-regular fa-eye"></i>
                </a>
                <a href="{{ route('comics.edit', $comic) }}">
                    <i class="fa-solid fa-pencil"></i>
                </a>
                
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
  </section>
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        $comics = Comic::paginate(10);
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $this->validation($data);

        $comic = new Comic();
        $comic->fill($data);
        $comic->save();

        return redirect()
            ->route('comics.show', $comic)
            ->with('message', 'Creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();

        $this->validation($data);

        $comic->update($data);
        return redirect()
            ->route('comics.show', $comic)
            ->with('message', 'Aggiornato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()
            ->route('comics.index')
            ->with('message', 'Eliminato con successo');
    }


    private function validation($data)
    {
        return Validator::make(
            $data,
            [
                'title' => 'required|string|max:50',
                'thumb' => 'required|url',
                'price' => 'required|integer',
                'series' => 'required|string|max:20',
                'sale_date' => 'required|date',
                'type' => 'required|string|in:comic book, graphic novel',
            ],
            [
                'title.required' => 'Il titolo è obbligatorio',
                'title.string' => 'Il titolo deve essere una stringa',
                'title.max' => 'Il titolo deve contenere massimo 50 caratteri',

                'thumb.required' => 'La copertina è obbligatoria',
                'thumb.url' => 'La copertina deve essere un url',

                'price.required' => 'Il prezzo è obbligatorio',
                'price.integer' => 'il prezzo deve essere un numero',

                'series.required' => 'La serie è obbligatoria',
                'series.string' => 'La serie deve essere una stringa',
                'series.max' => 'La serie deve contenere massimo 20 caratteri',

                'sale_date.required' => 'La data è obbligatoria',
                'sale_date.date' => 'Formato data errato',

                'type.required' => 'Il tipo è obbligatorio',
                'type.string' => 'Il tipo deve essere una stringa',
                'type.in' => 'Il tipo deve essere un valore tra "comic book, graphic novel"',
            ]

        )->validate();
    }
}
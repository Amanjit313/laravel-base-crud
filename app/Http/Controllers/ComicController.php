<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics/index', compact ('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate( $this->rulesValidate(), $this->messagesValidate());



        $data = $request->all();

        $new_comic = new Comic();

        $data['slug'] = Str::slug($data['title'], '-');

        $new_comic->fill($data);

        $new_comic->save();

        return redirect()->route('comics.create', $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
            return view('comics/show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {

        $request->validate( $this->rulesValidate(), $this->messagesValidate());


        $data = $request->all();

        $data['slug'] = Str::slug($data['title'], '-');

        $comic->update($data);

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }

    private function rulesValidate(){
        return [
            'title' => 'required|max:50|min:3',
            'image' => 'required|max:255|min:10',
            'type' => 'required|max:50|min:3'
        ];
    }

    private function messagesValidate(){
        return [
            'title.required' => 'Questo campo è obbigatorio',
            'title.max' => 'Questo campo non può superare i :max caratteri',
            'title.min' => 'Questo campo non deve essere inferiore ai :min caratteri',
            'image.required' => 'Questo campo è obbligatorio',
            'image.max' => 'Questo campo non può superare i :max caratteri',
            'image.min' => 'Questo campo non può superare i :min caratteri',
            'type.required' => 'Questo campo è obbligatorio',
            'type.max' => 'Questo campo non può superare i :max caratteri',
            'type.min' => 'Questo campo non può superare i :min caratteri'
        ];
    }
}

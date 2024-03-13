<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TargetRequest;
use App\Models\Target;
use App\Http\Requests;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $targets = Target::query()->paginate(10);
        return view('targets.index', compact('targets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('targets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TargetRequest $request)
    {

        if ($request->hasFile('slika')){
            $image_path = $request->file('slika')->store('profile-image');
            $image_path = str_replace('profile-image', 'storage/',$image_path);
        } else {
            $image_path = '/storage/no-photo.jpg';
        }



        $target = Target::create([
            'ime' => $request->ime,
            'prezime' => $request->prezime,
            'sifra_objekta' => $request->sifra_objekta,
            'datum_rodjenja' => $request->datum_rodjenja,
            'adresa' => $request->adresa,
            'mjesto_stanovanja' => $request->mjesto_stanovanja,
            'slika' => $image_path,
        ]);

        return redirect('/targets/'.$target->id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function show(Target $target)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function edit(Target $target)
    {
        return view('targets.edit', compact('target'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Target $target)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function destroy(Target $target)
    {
        //
    }
}

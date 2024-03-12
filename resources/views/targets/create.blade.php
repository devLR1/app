@extends('layouts.main')

@section('page_title', 'Novi unos')

@section('content')
<div class="row">
    <div class="col-3"></div>
    <div class="col-6 align-items-center">
        <form enctype="multipart/form-data" action="/targets" method="POST">
            @csrf
            <input class="form-control m-2" type="text" name="sifra_objekta" placeholder="Sifra objekta">
            @error('sifra_objekta')
            <span class="error m-2">
                {{ $message }}
            </span>
             @enderror
            <input class="form-control m-2" type="text" name="ime" placeholder="Ime">
            @error('ime')
            <span class="error m-2">
                {{ $message }}
            </span> 
            @enderror
            <input class="form-control m-2" type="text" name="prezime" placeholder="Prezime">
            @error('prezime')
            <span class="error m-2">
                {{ $message }}
            </span> 
            @enderror
            <input class="form-control m-2" type="date" name="datum_rodjenja" placeholder="dd/mm/yyyy">
            @error('datum_rodjenja')
            <span class="error m-2">
                {{ $message }}
            </span> 
            @enderror
            <input class="form-control m-2" type="text" name="adresa" placeholder="Adresa">
            @error('adresa')
            <span class="error m-2">
                {{ $message }}
            </span> 
            @enderror
            <input class="form-control m-2" type="text" name="mjesto_stanovanja" placeholder="Mjesto stanovanja">
            @error('mjesto_stanovanja')
            <span class="error m-2">
                {{ $message }}
            </span> 
            @enderror
            <input style="background: none; border: none" class="form-control" type="file" name="slika">
            @error('slika')
            <span class="error m-2">
                {{ $message }}
            </span> 
            @enderror
            <button type="submit" class="btn btn-info m-2">Sacuvaj</button>

        </form>
    </div>


</div>


@endsection

@extends('layouts.main')

@section('page_title', 'Novi unos')

@section('content')
<div class="row">
    <div class="col-3"></div>
    <div class="col-6 align-items-center">
        <form action="">

            <input class="form-control m-2" type="text" name="sifra_objekta" placeholder="Sifra objekta">
            <input class="form-control m-2" type="text" name="ime" placeholder="Ime">
            <input class="form-control m-2" type="text" name="prezime" placeholder="Prezime">
            <input class="form-control m-2" type="date" name="datum_rodjenja" placeholder="dd/mm/yyyy">
            <input class="form-control m-2" type="text" name="adresa" placeholder="Adresa">
            <input class="form-control m-2" type="text" name="mjesto_stanovanja" placeholder="Mjesto stanovanja">
            <input style="background: none; border: none" class="form-control m-2" type="file" name="slika">
            <button>Sacuvaj</button>

        </form>
    </div>


</div>


@endsection

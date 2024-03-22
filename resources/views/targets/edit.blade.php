@extends('layouts.main')
@section('additional_styles')
    <style>
        /**
  * Tabs
  */
        .tabs {
            display: flex;
            flex-wrap: wrap;
        }

        .tabs label {
            order: 1;
            display: block;
            padding: 1rem 2rem;
            margin-right: 0.2rem;
            cursor: pointer;
            background: #90caf9;
            font-weight: bold;
            transition: background ease 0.2s;
        }

        .tabs .tab {
            order: 99;
            flex-grow: 1;
            width: 100%;
            display: none;
            padding: 1rem;
            background: rgba(255, 255, 255, 0);
        }

        .tabs input[type=radio] {
            display: none;
        }

        .tabs input[type=radio]:checked + label {
            background: #6694b9;
        }

        .tabs input[type=radio]:checked + label + .tab {
            display: block;
        }

        @media (max-width: 45em) {
            .tabs .tab,
            .tabs label {
                order: initial;
            }

            .tabs label {
                width: 100%;
                margin-right: 0;
                margin-top: 0.2rem;
            }
        }
        /**
         * Generic Styling
        */
        /*body {*/
        /*    background: #eee;*/
        /*    min-height: 100vh;*/
        /*    box-sizing: border-box;*/
        /*    padding-top: 10vh;*/
        /*    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;*/
        /*    font-weight: 300;*/
        /*    line-height: 1.5;*/
        /*    !*max-width: 60rem;*!*/
        /*    margin: 0 auto;*/
        /*    font-size: 112%;*/
        /*}*/

    </style>
@endsection

@section('page_title', 'Novi unos')

@section('content')
    <div class="container">
        <form enctype="multipart/form-data" action="/targets" method="POST">
    <div class="tabs mt-5">
        <input type="radio" name="tabs" id="tabone" checked="checked">
        <label for="tabone">Target</label>
        <div class="tab">
            <div class="row">
                <div class="col-6">
                        @csrf
                        <input class="form-control m-2" type="text" name="sifra_objekta" value="{{$target->sifra_objekta}}" placeholder="Sifra objekta">
                        @error('sifra_objekta')
                        <span class="error m-2">
                {{ $message }}
            </span>
                        @enderror
                        <input class="form-control m-2" type="text" name="ime" value="{{$target->ime}}" placeholder="Ime">
                        @error('ime')
                        <span class="error m-2">
                {{ $message }}
            </span>
                        @enderror
                        <input class="form-control m-2" type="text" name="prezime" value="{{$target->prezime}}" placeholder="Prezime">
                        @error('prezime')
                        <span class="error m-2">
                {{ $message }}
            </span>
                        @enderror
                        <input class="form-control m-2" type="date" name="datum_rodjenja" value="{{$target->datum_rodjenja}}" placeholder="dd/mm/yyyy">
                        @error('datum_rodjenja')
                        <span class="error m-2">
                {{ $message }}
            </span>
                        @enderror
                        <input class="form-control m-2" type="text" name="adresa" value="{{$target->adresa}}" placeholder="Adresa">
                        @error('adresa')
                        <span class="error m-2">
                {{ $message }}
            </span>
                        @enderror
                        <input class="form-control m-2" type="text" name="mjesto_stanovanja" value="{{$target->mjesto_stanovanja}}" placeholder="Mjesto stanovanja">
                        @error('mjesto_stanovanja')
                        <span class="error m-2">
                {{ $message }}
            </span>
                        @enderror



                </div>
                <div class="col-3">
                    <img class="my-2 mx-5" src="{{asset($target->slika)}}" alt="">
                    <input style="background: none; border: none" class="form-control my-2 mx-5" type="file" name="slika">
                    @error('slika')
                    <span class="error m-2">
                {{ $message }}
            </span>
                    @enderror
                </div>
            </div>
        </div>

        <input type="radio" name="tabs" id="tabtwo">
        <label for="tabtwo">...</label>
        <div class="tab">
            <h1>Tab dva Content</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <input type="radio" name="tabs" id="tabthree">
        <label for="tabthree">...</label>
        <div class="tab">
            <h1>Tab tri Content</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
        <input type="radio" name="tabs" id="tabfour">
        <label for="tabfour">...</label>
        <div class="tab">
            <h1>Tab ceTri Content</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </div>
            <button type="submit" class="btn btn-info mx-4">Sacuvaj</button>
    </div>

    </form>

@endsection

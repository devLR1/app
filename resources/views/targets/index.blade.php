@extends('layouts.main')

@section('page_title', 'Lista targeta')

@section('content')

<div class="row">
<div class="col-12">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-users mr-1"></i>
                Targeti
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a href="/targets/create" class="btn btn-primary">
                            Novi unos
                        </a>
                    </li>
                </ul>
            </div>
        </div><!-- /.card-header -->
        <div class="card-body table-responsive">
            <form method="get" class="form-inline" action="/users">
                <input value="{{request('searchIme')}}" class="form-control p-2 dark-mode m-2" type="text" name="searchIme" placeholder="pretrazi ime">
                <input value="{{request('searchPrezime')}}" class="form-control dark-mode m-2" type="text" name="searchPrezime" placeholder="pretrazi prezime">
                <input value="{{request('searchUsername')}}" class="form-control dark-mode m-2" type="text" name="searchUsername" placeholder="pretrazi username">
                <button class="btn btn-info p-2 btn ">Pretrazi</button>
            </form>

            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Sifra objekta</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Adresa</th>
                    <th>Detailas</th>
                    @if(Auth::user()->is_admin)
                        <th>Edit</th>
                        <th>Delete</th>
                    @endif

                </tr>
                </thead>
                <tbody>
                @foreach($targets as $target)
                    <tr>
                        <td>{{ $target->sifra_objekta }}</td>
                        <td>{{ $target->ime }}</td>
                        <td>{{ $target->prezime }}</td>
                        <td>{{ $target->adresa }}</td>
                        <td>
                            <a href="/users/{{ $target->id }}/edit" class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-edit"></i>
                                DETAILS
                            </a>
                        </td>
                        @if(Auth::user()->is_admin)
                            <td>
                                <a href="/targets/{{$target->id}}/edit" class="btn btn-primary">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <form action="/users/{{ $target->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm btn-flat">
                                        <i class="fa fa-times"></i>
                                        DELETE
                                    </button>
                                </form>
                            </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            {{$targets->links()}}
        </div>
    </div>
@endsection

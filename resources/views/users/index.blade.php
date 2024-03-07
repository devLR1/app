@extends('layouts.main')

@section('page_title', 'Employees list')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-1"></i>
                        Employees
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <button type="button" onclick="vratiUser('new')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Novi nalog
                                </button>                            </li>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ime</th>
                            <th>Prezime</th>
                            <th>Username</th>
                            <th>Detailas</th>
                            @if(Auth::user()->is_admin)
                                <th>Edit</th>
                                <th>Delete</th>
                            @endif

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->ime }}</td>
                                <td>{{ $user->prezime }}</td>
                                <td>{{ $user->username }}</td>
                                <td>
                                    <a href="/users/{{ $user->id }}/edit" class="btn btn-primary btn-sm btn-flat">
                                        <i class="fa fa-edit"></i>
                                        DETAILS
                                    </a>
                                </td>
                                @if(Auth::user()->is_admin)
                                <td>
                                    <button type="button" onclick="vratiUser({{$user->id}})" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Edit
                                    </button>
                                </td>
                                <td>
                                    <form action="/users/{{ $user->id }}" method="POST">
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



                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header p-0">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form inside modal -->
                                    <form id="pop_up_forma" method="POST" >
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ime</label>
                                            <input type="text" class="form-control" id="ime" name="ime" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Prezime</label>
                                            <input type="text" class="form-control" name="prezime" id="prezime" aria-describedby="emailHelp">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
                                        </div>
                                        @error("username")
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="text" name="password" class="form-control" id="exampleInputPassword1">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Potvrda password-a</label>
                                            <input type="text" name="password_confirmation" class="form-control" id="exampleInputPassword1">
                                        </div>

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>                                    </form>
                                </div>
                                {{-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>
    @error("username")
    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror
    @error("password")
    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror
    @error("ime")
    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror

@endsection

<script>

    function vratiUser(id){
        var forma = document.getElementById('pop_up_forma')
        var ime = document.getElementById('ime')
        var prezime = document.getElementById('prezime')
        var username = document.getElementById('username')
        const inputMetod = forma.querySelector('input[name="_method"]');
        inputMetod.value = 'put'
        var dugme = forma.querySelector('button[type="submit"]')


        if(id == 'new'){
            forma.value = ''
            ime.value = ''
            prezime.value = ''
            username.value = ''
            // console.log(forma.method)
            const inputMetod = forma.querySelector('input[name="_method"]');
            inputMetod.value = 'post'
            forma.method = 'POST'
            forma.action = '/users'
            dugme.addEventListener('click', function(e){
                e.preventDefault()

                var formData = new FormData($('#pop_up_forma')[0]); // Zamijenite '#yourForm' s id-em vaše forme
                $.ajax({
                    url: 'http://127.0.0.1:8000/validate_user_form/',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if(response == 'success'){
                            forma.submit()
                        } else {
                            console.log(response)
                            $('.error').remove();
                            $.each(response.errors, function(key, value) {
                                // Pronađite polje u HTML-u na osnovu ključa
                                console.log(key)
                                var field = $('[name="' + key + '"]');
                                field.next('.error').remove();
                                // Prikazite poruku o grešci pored polja
                                field.after('<span class="error">' + value[0] + '</span>');
                            });
                        }

                        console.log(response.errors);

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

            })

            // console.log(forma.method)

        } else {

            $.ajax({
            url: 'http://127.0.0.1:8000/get-user-info/' + id,
            type: 'GET',
            success: function(response) {

                console.log(response)
                var forma = document.getElementById('pop_up_forma')
                forma.setAttribute('action', '/users/' + id)
                var ime = document.getElementById('ime')
                ime.value = response.ime;
                var prezime = document.getElementById('prezime')
                prezime.value = response.prezime
                var username = document.getElementById('username')
                username.value = response.username



            },
            error: function(xhr, status, error) {

                console.error(error);
            }
        });

            var formData = new FormData($('#pop_up_forma')[0]);
            formData.append('_token', '{{ csrf_token() }}')

            dugme.addEventListener('click', function(e){
                e.preventDefault()
                $.ajax({
                    url: 'http://127.0.0.1:8000/validate_user_form/',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if(response.success) {
                            forma.submit(); // Ako je uspjeh, pošalji formu
                        } else {
                            console.log(response);
                            $('.error').remove(); // Ukloni sve postojeće poruke o grešci

                            // Prikazi poruke o grešci za svako polje
                            $.each(response.errors, function(key, value) {
                                console.log(key);
                                var field = $('[name="' + key + '"]');
                                field.next('.error').remove(); // Ukloni poruku o grešci ako već postoji
                                field.after('<span class="error">' + value[0] + '</span>'); // Dodaj novu poruku o grešci
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

            })


        }


    }

</script>

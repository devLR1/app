<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $content_header = "Employees list";
        $breadcrumbs = [
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Employees list', 'link' => '/users' ],
        ];
        return view('users.index', compact(['users', 'content_header', 'breadcrumbs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $razur = Auth::user()->id;
        $user = User::create([
            'ime' => $request->ime,
            'prezime' => $request->prezime,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'razur' => $razur]);
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
//        dd($request);

    //    $request->validate([
    //        'ime' => 'required|min:3',
    //        'prezime' => 'required|min:3',
    //        'username' => 'required|min:3|unique:users,username,' . $user->id,
    //        'password' => 'confirmed|min:8'
    //    ]);

        if (!$request->filled('password')){
            $password = $user->password;
        } else {
            $password = Hash::make($request->password);
        }
        $user->update([
            'ime' => $request->ime,
            'prezime' => $request->prezime,
            'username' => $request->username,
            'razur' => Auth::user()->id,
            'password' => $password
        ]);
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function get_user_info(User $user){
        return $user;
    }

    public function validateForm(Request $request){

    //    return $request;
        if($request->filled('password') || $request->formTip == 'create'){
            $validator = Validator::make($request->all(), [
                'ime' => 'required|min:3|string',
                'prezime' => 'required|min:3|string',
                'username' => 'required|min:3|unique:users,username,' .$request->userID,
                'password' => 'required|min:8|confirmed']);
        } else {
            $validator = Validator::make($request->all(), [
                'ime' => 'required|min:3|string',
                'prezime' => 'required|min:3|string',
                'username' => 'required|min:3|unique:users,username,' .$request->userID,


            ]);

        }

        $customMessages = [
            'ime.required' => 'Polje ime je obavezno',
            'ime.min' => 'Polje ime mora sadržavati najmanje :min karaktera',
            'username.unique' => 'Vec postoji nalog sa tim username-om',
            'password.confirmed' => 'Lozinke se ne poklapaju'
            // Dodajte druge prilagođene poruke o grešci za druga pravila validacije ako je potrebno
        ];

        $validator->setCustomMessages($customMessages);



        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
           return response()->json(['errors' => $errors]);
            // return $request;
        } else {
            return 'success';
        }

    }
}

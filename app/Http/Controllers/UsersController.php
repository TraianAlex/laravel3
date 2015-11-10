<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateUserRequest;//5.1
use App\Http\Requests\EditProfileRequest;
use App\User;
use Auth;

class UsersController extends Controller
{
    // Filters for checking if route parameter id's exist
    // and sometimes checking if logged in user is also the owner.
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['edit', 'update', 'destroy']]);
        $this->middleware('exist', ['only' => ['show', 'edit', 'update', 'destroy']]);
        $this->middleware('owner', ['only' => ['edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     * GET /users
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users')->withUsers(User::paginate(8));
    }
    /**
     * Show the form for creating a new resource.
     * GET /users/create
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('create');
    // }
    /**
     * Store a newly created resource in storage.
     * POST /users
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(CreateUserRequest $request)
    // {
    //     //5.1
    //     $data = [
    //         'username' => $request->get('username'),
    //          'password' => bcrypt($request->get('password')),
    //          'bio' => $request->get('bio'),
    //          'name' => $request->get('name'),
    //          'email' => $request->get('email')
    //     ];
    //     User::create($data);
    //     return redirect('/users')->with(['message' => 'Registered']);
        //4.2
        // $rules = array(
        //     'username' => 'required|unique:users',
        //     'password' => 'required|min:6',
        //     'password-repeat' => 'required|same:password'
        // );

        // $validator = \Validator::make(\Input::all(), $rules);

        // if ($validator->fails())
        //     return \Redirect::to('users/create')
        //         ->withInput()
        //         ->withErrors($validator->messages());

        // User::create(array(
        //     'username' => \Input::get('username'),
        //     'password' => \Hash::make(\Input::get('password')),
        //     'bio' => \Input::get('bio')
        // ));

        // return \Redirect::to('users');
    //}
    /**
     * Display the specified resource.
     * GET /users/{id}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        //if($user == null) \Redirect::to('users');
        $owner = (Auth::id() === (int) $id);
        return view('profile')->withUser($user)->withOwner($owner);
    }
    /**
     * Show the form for editing the specified resource.
     * GET /users/{id}/edit
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$user = User::find($id);
        //if($user == null) \Redirect::to('users');
        return view('edit')->with('id', $id);
    }
    /**
     * Update the specified resource in storage.
     * PUT /users/{id}
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProfileRequest $request, $id)
    {   
        //5.1
        $user = User::find($id);
        if($request->has('username')) $user->name = $request->get('username');
        if($request->has('name')) $user->name = $request->get('name');
        if($request->has('email')) $user->name = $request->get('email');
        if($request->has('bio')) $user->name = $request->get('bio');
        if($request->has('password')) $user->password = bcrypt($request->get('password'));
        $user->save();
        return redirect('users/'.$id)->with(['message' => 'Your profile was succesfully edited']);
        //4.2
        // $rules = array(
        //     'username' => 'unique:users',
        //     'password' => 'min:6'
        // );

        // $validator = \Validator::make(\Input::all(), $rules);

        // if ($validator->fails())
        //     return \Redirect::to('users/'.$id.'/edit')
        //         ->withInput()
        //         ->withErrors($validator->messages());

        // $user = User::find($id);
        // if (\Input::has('username')) $user->username = \Input::get('username');
        // if (\Input::has('name')) $user->name = \Input::get('name');
        // if (\Input::has('email')) $user->email = \Input::get('email');
        // if (\Input::has('bio')) $user->bio = \Input::get('bio');
        // if (\Input::has('password')) $user->password = \Hash::make(\Input::get('password'));
        // $user->save();

        // return \Redirect::to('users/'.$id);
    }
    /**
     * Remove the specified resource from storage.
     * DELETE /users/{id}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fallenOne = User::find($id);
        $fallenOne->delete();
        return redirect('users');
    }
}
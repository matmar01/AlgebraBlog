<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller {
	
	public function __construct() {
		
		$this->middleware('auth');
		
		}

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	
	 
    public function index() {
        $users = User::all();
		return view('users.index',compact('users'));
		}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view ('users.create');
		}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
		//validate request()->validate
		$user = new User();
		
		$user->name = $request['username'];
		$user->email = $request['email'];
		$user->password = Hash::make($request['password']);
		$user->save();
		
		return redirect()->route('users.index')->withFlashMessage('Uspje¹no ste dodali novog korisnika');
		}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
		$user = User::find($id);
		return view('users.show',compact('user'));
		}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
		$user = User::find($id);
        return view ('users.edit',compact('user'));
		}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
		$user = User::find($id);
		if (isset($request->username)) {
			$user->name = $request['username'];
			}
		if (isset($request->email)) {
			$user->email = request('email');
			}
		if (isset($request->password)) {	
			$user->password = bcrypt($request['password']);
			}
		$user->save();
		return redirect()->route('users.index')->withFlashMessage('User je uspješno updatan!');
		}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::find($id);
		$user -> delete();
		
		return redirect()->route('users.index')->withFlashMessage('User deleted!');
		}
	}

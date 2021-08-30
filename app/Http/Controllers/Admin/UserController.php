<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::all();
        $users = User::where('role', null)->paginate(9);

        return view('admin.users.index', [
            'members' => $users,           
        ]);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'digits_between: 9,12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = new User([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'address'=> $request->address,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
        $user->save();

        return $this->index()->with([
            'message_success' => 'The '. $user->first_name . ' was saved!',

        ]);

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', [
            'user'=>$user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        return view('admin.users.edit')->with([
            'member' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'digits_between: 9,12'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id) ],
        ]);

        $user->update([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'address'=> $request->address,
            'phone'=> $request->phone,
            'email'=> $request->email,
        ]);      

        return $this->index()->with([
            'message_success' => 'User '. $user->first_name . ' details updated!',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $oldName= $user->model;
        $user->delete();
        return $this->index()->with([
            'message_success' => 'The user '. $oldName . ' was deleted!',

        ]);
    }

    public function search(){       
        $search = $_GET['search'];
        $search_items = User::where('first_name', 'LIKE', '%' . $search .'%')->orWhere('last_name', 'LIKE', '%' . $search .'%')->orWhere('email', 'LIKE', '%' . $search .'%')->paginate(9);  
        
        
        return view('admin.users.index', [
            'members'=>$search_items,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 'staff')->paginate(9);

        return view('admin.staff.index', [
            'staff' => $users,           
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.create');
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
            'role' => 'staff',
        ]);
        $user->save();


        return $this->index()->with([
            'message_success' => $user->first_name . ' was saved as a new staff member!',

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $staff)
    {
        return view('admin.staff.show')->with([
            'member'=> $staff,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $staff)
    {
        
        return view('admin.staff.edit')->with([
            'member'=> $staff,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $staff)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'digits_between: 9,12'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($staff->id) ],
            
        ]);

        $staff->update([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'address'=> $request->address,
            'phone'=> $request->phone,
            'email'=> $request->email,
        ]);      

        return $this->index()->with([
            'message_success' => 'Staff member '. $staff->first_name . ' details updated!',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $staff)
    {
        $oldName= $staff->model;
        $staff->delete();
        return $this->index()->with([
            'message_success' => 'The user '. $oldName . ' was deleted!',

        ]);
    }

    public function search(){       
        $search = $_GET['search'];
        $search_items = User::where('first_name', 'LIKE', '%' . $search .'%')->orWhere('last_name', 'LIKE', '%' . $search .'%')->orWhere('email', 'LIKE', '%' . $search .'%')->paginate(9);        
        return view('admin.staff.index', [
            'staff'=>$search_items,
        ]);
    }
}

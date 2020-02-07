<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('groups',100)->get();
        return view('admin.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',            
            'email' => 'required|unique:users',            
            'password' => 'required',
        ]);

        $admin = new User;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->groups = 100;
        $admin->save();


        return redirect()->route('admins.index')->with('success', 'Admin added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(User $adimn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        return view('admin.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        $this->validate($request, [
            'name' => 'required',            
            'email' => 'required| unique:users,email,$admin->id',            
            'password' => 'required',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->groups = 100;
        $admin->save();

        return redirect()->route('admins.index')->with('success', 'Admin saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {

            if($admin->delete()){
                return redirect()->route('admins.index')->with('success', 'Admin deleted.');
            }else{
                return redirect()->route('admins.index')->with('error', 'Error while deleting admin.');
            }

    }
}

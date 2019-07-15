<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Http\Requests\UsersRolesStore;
use Illuminate\Http\Request;

class UsersRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users-roles.home')->with('users', User::with('roles')->where('id', '!=', \Auth::user()->id )->get());
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->with('roles')->firstOrFail();

        return
        view('admin.users-roles.edit')
        ->with('user', $user)
        ->with('roles', Role::whereNotIn('id', $user->roles->pluck('id'))->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRolesStore $request, $id)
    {
        $request->validated();

        $user = User::where('id', $id)->with('roles')->firstOrFail();
        $user->roles()->sync($request->input('roles'));

        return redirect()
        ->back()
        ->with('message', 'Permissões Modificadas com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

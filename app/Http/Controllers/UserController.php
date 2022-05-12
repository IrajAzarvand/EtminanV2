<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Store a newly created user in db.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function StoreNewUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:users|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
            'role' => 'required',
        ]);


        DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'mailpass' => Crypt::encryptString($request->input('password')),
            'role_id' => $request->input('role'),
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $SelectedUserId = $request->input('user');
        if ($SelectedUserId) {
            $user = User::find($SelectedUserId);
            $user->delete();
        }
        return redirect()->back();
    }
}
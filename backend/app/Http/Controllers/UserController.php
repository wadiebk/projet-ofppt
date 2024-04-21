<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::all());
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
            'first_name' => 'required',
            'last_name' => 'required',
            'cin' => 'required|unique:users,cin',
            'email' => 'required|unique:users,email',
            'classe' => 'required',
        ]);

        $password = Str::random(8);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->cin = $request->cin;
        $user->email = $request->email;
        $user->classe = $request->classe;
        $user->password = $request->password;
        $user->save();
        return response()->json(['message' => 'user created successfully', 'cin' => $user->cin, 'email' => $user->email, 'password' => $password]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'user not found'], 404);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'user not found'], 404);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'cin' => 'required|unique:users,cin',
            'email' => 'required|unique:users,email',
            'classe' => 'required',
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->cin = $request->cin;
        $user->email = $request->email;
        $user->classe = $request->classe;
        $user->save();
        return response()->json(['message' => 'user updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'user not found'], 404);
        $user->delete();
        return response()->json(['message' => 'user deleted successfully']);
    }
}

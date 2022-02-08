<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index()
    {
        $data = User::all();

        return response()->json([
            'data' => $data
        ]);
    }

    public function store()
    {
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        return response()->json([
            'message' => 'user berhasil ditambahkan'
        ]);
    }

    public function update($id)
    {
        $user = User::find($id);

        $user->update([
            'name' => request('name'),
            'email' => request('email'),
        ]);

        return response()->json([
            'message' => 'user berhasil di update'
        ]);
    }

    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();

        return response()->json([
            'message' => 'user berhasil di hapus'
        ]);
    }
}

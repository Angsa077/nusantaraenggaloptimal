<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SupervisorManajemenuserController extends Controller
{
    public function index()
    {
        $data = User::orderBy('id')->get();
        return view('supervisor.manajemenuser.index', ['data'=>$data]);
    }

    public function show(string $id)
    {
        $user = User::all();
        $data = User::where('id', $id)->first();
        return view('supervisor.manajemenuser.show', ['data'=>$data, 'user' => $user]);
    }
}

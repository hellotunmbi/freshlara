<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //

    public function index()
    {
        return User::all();
    }

    public function search(Request $request)
    {
        $sortBy = 'id';
        $orderBy = 'desc';
        $perPage = 10;
        $q = null;

        if ($request->has('sortBy')) $sortBy = $request->query('sortBy');
        if ($request->has('orderBy')) $orderBy = $request->query('orderBy');
        if ($request->has('perPage')) $perPage = $request->query('perPage');
        if ($request->has('q')) $q = $request->query('q');

        $users = User::search($q)->orderBy($sortBy, $orderBy)->paginate($perPage);

        return $users;
    }
}

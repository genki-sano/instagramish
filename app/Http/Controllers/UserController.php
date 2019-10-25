<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        // 認証が必要
        $this->middleware('auth');
    }

    /**
     * 会員詳細
     * @param string $id
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->first();

        return $user ?? abort(404);
    }
}

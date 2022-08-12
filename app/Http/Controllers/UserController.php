<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function actAs($userId, Request $request) {
        Auth::loginUsingId($userId);

        $authToken = auth()->user()->createToken("DEVELOPER: " . $request->device_name)->plainTextToken;

        return ['token' => $authToken];
    }
}

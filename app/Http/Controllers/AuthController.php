<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Events\UserRegistered;

class AuthController extends Controller
{
    /**
     * Register user
     */
    public function register(StoreUserRequest $request)
    {
        $user = DB::transaction(function() use ($request) {
            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
            ]);

            $user->countries()->attach($request->country_id);

            $user->phones()->create([
                'country_id'    => $request->country_id,
                'phone'         => $request->phone,
            ]);

            return $user;
        });

        event(new UserRegistered($user));

        return $user;
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ApiLoginUserRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Support\Facades\Auth;

final class ApiAuthController extends Controller
{
    use ApiResponses;

    public function login(ApiLoginUserRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (! Auth::attempt($credentials)) {
            return $this->errorResponse('Unauthorized', 401);
        }

        $user = User::firstWhere('email', $request->email);

        return $this->ok('Authenticated', ['token' => $user->createToken('API token for '.$user->email)->plainTextToken]);
    }
}

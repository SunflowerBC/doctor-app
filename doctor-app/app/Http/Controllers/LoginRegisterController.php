<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginRegisterController extends Controller
{
    use ApiResponseTrait;

    public function register(Request $request): JsonResponse
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:250',
            'email' => 'required|string|email:rfc,dns|max:250|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        if ($validate->fails()) {
            return $this->errorResponse("Validation error!", $validate->errors()->toArray(), 403);

        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $data['token'] = $user->createToken($request->email, ["*"], now()->addWeek())->plainTextToken;
        $data['user'] = $user;

        return $this->successResponse("User is created successfully.", $data, 200);
    }

    public function login(Request $request): JsonResponse
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if ($validate->fails()) {
            return $this->errorResponse("Validation error!", $validate->errors()->toArray(), 403);
        }

        // Check email exist
        $user = User::where('email', $request->email)->first();

        // Check password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->errorResponse("Invalid credentials", [], 401);

        }

        $data['token'] = $user->createToken($request->email, ["*"], now()->addWeek())->plainTextToken;
        $data['user'] = $user;

        return $this->successResponse("User is logged in successfully.", $data, 200);
    }

    public function logout(): JsonResponse
    {
        try {
            auth()->user()->tokens()->delete();
        } catch (Exception $e) {
            return $this->errorResponse("Something went wrong!", [], 500);
        }

        return $this->successResponse("User has logged out!");
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'allUser', 'update', 'delete']]);
    }

    public function allUser()
    {
        return UserResource::collection(User::get());
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY); // 422
        }

        if (! $token = JWTAuth::attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED); // 401
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return UserResource
     */
    public function me()
    {
        return new UserResource( auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl') * 60,
        //    'user' => new UserResource(auth()->user())
        ]);
    }

    public function register(Request $request) {
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->phone_number = $request->get('phone_number');
        $user->password = Hash::make($request->get('password'));
        $user->role = $request->get('role');
        if ($user->save()) {
            return response()->json([
                'success' => true,
                'message' => 'User created successfully: ' . $user->username,
            ], Response::HTTP_CREATED);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not created'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(Request $request) {
        $user = User::find($request->get('id'));
        if ($request->has('name')) $user->name = $request->get('name');
        if ($request->has('password')) $user->password = $request->get('password');
        if ($request->has('phone_number')) $user->phone_number = $request->get('phone_number');

        if ($user->save()) {
            return response()->json([
                'success' => true,
                'message' => 'User updated successful with ID: ' . $user->id,
                'car_id' => $user->id
            ], Response::HTTP_OK);
        }
        return response()->json([
            'success' => false,
            'message' => 'User updated failed'
        ], Response::HTTP_BAD_REQUEST);
    }

    public function delete(Request $request) {
        $user = User::find($request->get('id'));
        if ($user->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'User deleted successful with ID: ' . $user->id,
                'car_id' => $user->id
            ], Response::HTTP_OK);
        }
        return response()->json([
            'success' => false,
            'message' => 'User deleted failed'
        ], Response::HTTP_BAD_REQUEST);
    }
}
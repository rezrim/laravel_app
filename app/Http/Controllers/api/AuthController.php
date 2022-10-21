<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => $validator->errors()
            ]);
            // return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $data['token'] =  $user->createToken('MyApp')->plainTextToken;
        $data['user'] =  $user;

        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'Register Berhasil'
        ]);
        // return $this->sendResponse($success, 'User register successfully.');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $data['token'] =  $user->createToken('MyApp')->plainTextToken;
            $data['user'] =  $user;

            return response()->json([
                'status' => true,
                'data' => $data,
                'message' => 'Register Berhasil'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'Unauthorization'
            ]);
        }
    }
}

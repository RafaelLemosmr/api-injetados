<?php

namespace App\Services;

use App\Exceptions\AuthFailedException;
use App\Repositories\AuthRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthService
{

    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function auth($credentials)
    {
        try {
            return response()->json([
                'token' => $this->authRepository->auth($credentials),
            ]);
        }catch(AuthFailedException $authException){
            return response()->json([
                'status' => 'erro',
                'message' => $authException->getMessage(),
                'code' => '403'
            ], 403);
        }catch(Exception $e){
            return response()->json([
                'status' => 'erro',
                'message' => $e->getMessage(),
                'code' => '500'
            ], 500);
        }
    }

    public function createUser($params)
    {
        try{
            return response()->json([
                'new_user' => $this->authRepository->createUser($params)
            ]);
        }catch(Exception $e){
            return response()->json([
                'status' => 'erro',
                'message' => $e->getMessage(),
                'code' => '500'
            ], 500);
        }
    }
}
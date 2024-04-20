<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\CreateOrUpdateUserRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function auth(AuthRequest $request)
    {
        $credentials = $request->validated();
        $results = $this->authService->auth($credentials);

        return $results;
    }

    public function getProfiles(Request $request)
    {
        return $request->user()->profiles->pluck('name');
    }

    public function createUser(CreateOrUpdateUserRequest $request)
    {
        $params = $request->validated();
        return $this->authService->createuser($params);
    }
}

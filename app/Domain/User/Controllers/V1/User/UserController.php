<?php

namespace App\Domain\User\Controllers\V1\User;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Domain\User\Resources\UserResource;
use App\Infrastructure\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) : JsonResponse
    {
        $user = $request
            ->user();

        return (new UserResource($user))
            ->response();
    }
}

<?php

namespace App\Domain\User\Controllers\V1\User;

use Illuminate\Http\Request;
use App\Domain\User\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Domain\User\Resources\UserResource;
use App\Infrastructure\Controllers\Controller;
use App\Domain\User\Validators\User\UserController\UpdateRequest;

class UserController extends Controller
{
    /**
     * Display current user resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request) : JsonResponse
    {
        $user = $request
            ->user();

        return (new UserResource($user))
            ->response();
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        $this->authorize($user);
        
        return (new UserResource($user))
            ->response();
    }

    /**
     * Update the current user resource.
     *
     * @param UpdateRequest $request
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, User $user) : JsonResponse
    {
        $this->authorize($user);

        $user
            ->update([
                'first_name' => $request->input('first_name') ?: $request->user()->first_name,
                'last_name' => $request->input('last_name') ?: $request->user()->last_name,
                'email' => $request->input('email') ?: $request->user()->email,
                'password' => $request->input('password') ? Hash::make($request->input('password')) : $request->user()->password
            ]);

        return (new UserResource($user))
            ->response();
    }
}

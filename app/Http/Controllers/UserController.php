<?php

namespace App\Http\Controllers;

use App\Exceptions\ConflictException;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        $hashedPassword = Hash::make($data['password']);

        $userEmail = User::where(['email' => $data['email']])->first();
        if ($userEmail) throw new ConflictException();

        $user = User::create([...$data, 'password' => $hashedPassword]);
        return new UserResource($user);
    }

    public function index($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('view', $user);
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->all();
        $hashedPassword = Hash::make($data['password']);
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        $user->update([...$data, 'password' => $hashedPassword]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('delete', $user);
        $user->delete();
    }
}

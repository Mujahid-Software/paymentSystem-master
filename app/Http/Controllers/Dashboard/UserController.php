<?php

namespace App\Http\Controllers\Dashboard;


use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{
    public function index()
    {
        $this->authorize('read User');
        $users = User::useFilters()->dynamicPaginate();

        return view('dashboard.users.index', compact(
            'users',
        ));
    }

    public function create()
    {
        $this->authorize('create User');
        return view('dashboard.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $this->authorize('create User');
        $user = User::create($request->validated());
        if ($request->has('permissions')) {
            $user->syncPermissions($request->permissions);
        }

        return to_route('dashboard.users.index')->with('success', __('created successfully'));
    }

    public function show(User $user)
    {
        $this->authorize('read User');
        return view('dashboard.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update User');
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update User');
        $user->update($request->validated());
        $user->syncPermissions($request->permissions);

        return back()->with('success', __('updated successfully'));
    }

    public function destroy(User $user)
    {
        $this->authorize('delete User');
        $user->delete();

        return to_route('dashboard.users.index')->with('success', __('deleted successfully'));
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * El auto-registro público siempre crea usuarios con rol "usuario".
     * Los ingenieros se dan de alta manualmente desde el seeder o por
     * un ingeniero existente (no se expone por registro público por seguridad).
     */
    public function store(RegisterUserRequest $request): RedirectResponse
    {
        $userRole = Role::where('name', Role::USUARIO)->firstOrFail();

        $user = User::create([
            'role_id' => $userRole->id,
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'department' => $request->validated('department'),
            'password' => Hash::make($request->validated('password')),
        ]);

        Auth::login($user);

        return redirect()->route('user.tickets.index');
    }
}

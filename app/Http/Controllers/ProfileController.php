<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Pessoa;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $users = User::where(function ($query) use ($search) {
            if ($search) {
                $query->where('nome', 'LIKE', "%{$search}%");
                $query->orWhere('cpf', 'LIKE', "%{$search}%");
            }
        })->get();

        //dd($users);

        return view('sistema.users.index', compact('users'));
    }

    public function create()
    {
        return view('sistema.users.create');

    }

    public function add(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->cpf = $request->cpf;
        $user->email = $request->email;
        $user->unidade = $request->unidade;
        $user->perfil = isset($request->perfil) ? $request->perfil : 'user';
        $user->password = Hash::make($request->password);

        $user->save();

//        dd($user);

        return redirect()->route('profile.index')->with('msg', 'Cadastrado com sucesso!');

    }



    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

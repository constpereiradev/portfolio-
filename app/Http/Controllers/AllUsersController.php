<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class AllUsersController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()->role_id == 4) {
            return redirect('/');
        }

        if (auth()->user()->role_id == 1) {
            $users = User::with('role');
            $roles = Role::where('status', '1');

            if ($request->buscar != '') {
                $users
                    ->where('name', 'like', '%' . $request->buscar . '%')
                    ->orWhere('user_name', 'like', '%' . $request->buscar . '%')
                    ->orWhere('email', 'like', '%' . $request->buscar . '%');
            }
        }

        return Inertia::render(
            'AllUsers/Index',
            [
                'allUsers' => $users->get(),
                'roles' => $roles->get(),
            ]
        );
    }

    public function show(Request $request, $id)
    {
    }

    public function darkMode()
    {
        dd(auth()->user());
    }

    public function store(UserRequest $request)
    {
        //se for um tipo de cliente sem autorização pra cadastrar
        if (auth()->user()->role_id == 4) {
            return redirect('/');
        }

        User::create([
            'user_name' => $request->user_name,
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
            'status' => 1,
        ]);
        return back()->with([
            'title' => 'Cadastro relizado',
            'message' => 'Cadastro efetuado com sucesso.',
            'type' => 'alert-success'
        ]);
    }

    public function block($id)
    {
        if ((auth()->user()->role_id == 1 || auth()->user()->role_id == 2) && auth()->user()->id != $id) {
            $bloquear = User::find($id);
            $block = 0;
            ($bloquear->status == 0) ? $block = 1 : $block = 0;
            $bloquear->status = $block;
            $bloquear->save();

            if ($block == 0) {
                return back(303)->with([
                    'title' => 'Usuário Bloqueado.',
                    'message' => 'O usuário foi bloqueado com sucesso.',
                    'type' => 'alert-success'
                ]);
            } else {
                return back(303)->with([
                    'title' => 'Usuário Desloqueado.',
                    'message' => 'O usuário foi desbloqueado com sucesso.',
                    'type' => 'alert-success'
                ]);
            }
        }

        return redirect('/');
    }

    static function logout()
    {
        auth()->guard('web')->logout();
        return redirect('/login');
    }
}

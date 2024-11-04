<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompletarDatos
{

    public function create()
    {
        $user = Auth::user();
        if (empty($user->se_registro)) {
            return view('auth.completar-datos', compact('user'));
        }
        return redirect()->route('panel');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:9', 'min:9'],
        ])->validate();

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->telefono = $request->telefono;
        $user->se_registro = 1;

        $user->save();
        return redirect()->intended(route('panel'));
    }
}

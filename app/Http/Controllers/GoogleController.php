<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $user_google = Socialite::driver('google')->user();

            $se_registro = User::where('email', $user_google->email)->where('estado', '!=', 0)->first();
            if (empty($se_registro)) {
                $user = new User();
                $user->name = $user_google->name;
                $user->email = $user_google->email;
                $user->google_id = $user_google->id;
                $user->password = bcrypt($this->usuarioCorreo($user_google->email));
                $user->email_verified_at = time();
                $user->save();
                $rol = determinar_rol($user->email);
                $user->assignRole($rol);
                Auth::login($user);
                return redirect()->intended(route('panel'));
            } else {
                if ($se_registro->estado == 2) {
                    return redirect('login')->withErrors(['google' => 'Su cuenta se encuentra suspendido.'])->withInput();
                }
                Auth::login($se_registro);
                return redirect()->intended(route('panel'));
            }
        } catch (\Exception $e) {
            return redirect('login')->withErrors(['google' => 'Ocurrió un error al acceder con Google.'])->withInput();
        }
    }

    private function usuarioCorreo($correo)
    {
        return strtok($correo, '@');
    }
}

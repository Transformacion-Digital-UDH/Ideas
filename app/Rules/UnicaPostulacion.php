<?php

namespace App\Rules;

use App\Models\Postulaciones;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class UnicaPostulacion implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $exist = Postulaciones::where('pro_id', $value)
            ->where('user_id', Auth::user()->id)
            ->where('pos_estado', 1)
            ->first();

        if ($exist) {
            $fail('Usted ya postulo en esta propuesta.');
        }
    }
}

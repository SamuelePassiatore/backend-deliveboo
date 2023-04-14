<?php

namespace App\Rules;

use App\Models\Plate;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidationPlates implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $plate = Plate::find($value);
        if (!$plate) {
            $fail('Nessun piatto trovato.');
        }
    }
}

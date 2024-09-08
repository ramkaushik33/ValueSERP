<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AtLeastOneFilled implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Check if at least one query field is filled (not empty)
        foreach ($value as $query) {
            if (!empty($query)) {
                return true;
            }
        }

        // Return false if all queries are empty
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'At least one search query must be filled.';
    }
}

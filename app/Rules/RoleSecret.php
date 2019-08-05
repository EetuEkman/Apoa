<?php

namespace App\Rules;

use App\Role;
use Illuminate\Contracts\Validation\Rule;

/**
 * Class RoleSecret
 * @package App\Rules
 *
 * Checks if the supplied role secret matches
 * the one from the database
 */
class RoleSecret implements Rule
{
    public $roleId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($roleId)
    {
        $this->roleId = $roleId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // If the user wants to register as a teacher

        if($this->roleId == 1) {
            // Fetch the role secret from the database

            $roleSecret = Role::select('secret')->where('id', $this->roleId)->first()->toArray();
            $roleSecret = $roleSecret['secret'];

            // If the supplied key matches the one from database

            if(hash_equals($roleSecret, $value))
            {
                return true;
            }
        }

        // If the user wants to register as a student,
        // we'll accept any key.

        if($this->roleId === 2)
        {
            dd('returning true, roleId === 2');

            return true;
        }

        // Otherwise the check is failed.

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Väärä avain.';
    }
}

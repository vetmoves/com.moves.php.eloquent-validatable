<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Moves\Eloquent\Validatable\Interfaces\IValidatable;
use Moves\Eloquent\Validatable\Traits\TValidatable;

class MValidatableFunctions extends Model implements IValidatable
{
    use TValidatable;

    protected $table = 'test_users';
    protected $validateOnSave = true;

    public function getValidationRules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string'
        ];
    }

    public function getValidationMessages()
    {
        return [
            'first_name.required' => 'Test msg for first name method validation',
            'last_name.required' => 'Test msg for last name method validation'
        ];
    }

    public function getValidationCustomAttributes()
    {
        return [
            'first_name' => 'First Name',
            'last_name' => 'Last Name'
        ];
    }
}

<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Moves\Eloquent\Validatable\Interfaces\IValidatable;
use Moves\Eloquent\Validatable\Traits\TValidatable;

class MValidatableAttributes extends Model implements IValidatable
{
    use TValidatable;

    protected $table = 'test_users';
    protected $validateOnSave = true;

    protected $validationRules = [
        'first_name' => 'required|string',
        'last_name' => 'required|string'
    ];

    protected $validationMessages = [
        'first_name.required' => 'Test msg for first name property validation',
        'last_name.required' => 'Test msg for last name property validation'
    ];

    protected $validationCustomAttributes = [
        'first_name' => 'First Name',
        'last_name' => 'Last Name'
    ];
}

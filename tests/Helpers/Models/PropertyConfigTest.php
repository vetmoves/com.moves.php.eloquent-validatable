<?php

namespace Moves\TestHelpers\Models;

class PropertyConfigTest implements IValidatable
{
    use Validatable;

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

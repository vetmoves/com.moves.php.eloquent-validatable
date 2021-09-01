<?php

namespace Moves\TestHelpers\Models;

use Moves\Eloquent\Validatable\Interfaces\IValidatable;
use Moves\Eloquent\Validatable\Validatable;

class MethodConfigTest implements IValidatable
{
    use Validatable;

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

    }

    public function getValidationCustomAttributes()
    {
        
    }
}

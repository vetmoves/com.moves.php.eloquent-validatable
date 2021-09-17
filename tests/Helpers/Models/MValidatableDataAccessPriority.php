<?php

namespace Tests\Helpers\Models;

use Illuminate\Database\Eloquent\Model;
use Moves\Eloquent\Validatable\Interfaces\IValidatable;
use Moves\Eloquent\Validatable\Validatable;

class MValidatableDataAccessPriority extends Model implements IValidatable
{
    use Validatable;

    protected $table = 'test_users';
    protected $validateOnSave = true;

    public function attributesToArray() {
        return [
            'first_name' => 'Alan',
            'last_name' => 'Ladd'
        ];
    }

    public function getValidationData() {
        return [
            'first_name' => 'Veronica',
            'last_name' => 'Lake'
        ];
    }
}

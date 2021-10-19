<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Moves\Eloquent\Validatable\Interfaces\IValidatable;
use Moves\Eloquent\Validatable\Traits\TValidatable;

class MValidatableDataAccessPriority extends Model implements IValidatable
{
    use TValidatable;

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

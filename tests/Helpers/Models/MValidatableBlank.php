<?php

namespace Tests\Helpers\Models;

use Illuminate\Database\Eloquent\Model;
use Moves\Eloquent\Validatable\Interfaces\IValidatable;
use Moves\Eloquent\Validatable\Validatable;

class MValidatableBlank extends Model implements IValidatable
{
    use Validatable;
}
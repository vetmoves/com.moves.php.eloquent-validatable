<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Moves\Eloquent\Validatable\Interfaces\IValidatable;
use Moves\Eloquent\Validatable\Traits\TValidatable;

class MValidatableBlank extends Model implements IValidatable
{
    use TValidatable;
}

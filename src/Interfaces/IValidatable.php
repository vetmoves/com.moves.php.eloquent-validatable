<?php

namespace Moves\Eloquent\Validatable\Interfaces;

interface IValidatable
{
    public function _getValidateOnSave(): bool;

    public function validate();
}
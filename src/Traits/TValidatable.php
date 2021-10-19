<?php

namespace Moves\Eloquent\Validatable\Traits;

use Illuminate\Support\Facades\Validator;
use Moves\Eloquent\Validatable\Interfaces\IValidatable;

trait TValidatable
{
    public static function bootTValidatable()
    {
        static::saving(function (IValidatable $model) {
            if ($model->_getValidateOnSave()) {
                $model->validate();
            }
        });
    }

    public function _getValidateOnSave(): bool
    {
        if (method_exists($this, 'getValidateOnSave')) {
            return $this->getValidateOnSave();
        }

        if (property_exists($this, 'validateOnSave')) {
            return $this->validateOnSave;
        }

        return false;
    }

    public function _getValidationData(): array
    {
        if (method_exists($this, 'getValidationData')) {
            return $this->getValidationData();
        }

        return $this->attributesToArray();
    }

    public function _getValidationRules(): array
    {
        if (method_exists($this, 'getValidationRules')) {
            return $this->getValidationRules();
        }

        if (property_exists($this, 'validationRules')) {
            return $this->validationRules;
        }

        return [];
    }

    public function _getValidationMessages(): array
    {
        if (method_exists($this, 'getValidationMessages')) {
            return $this->getValidationMessages();
        }

        if (property_exists($this, 'validationMessages')) {
            return $this->validationMessages;
        }

        return [];
    }

    public function _getValidationCustomAttributes(): array
    {
        if (method_exists($this, 'getValidationCustomAttributes')) {
            return $this->getValidationCustomAttributes();
        }

        if (property_exists($this, 'validationCustomAttributes')) {
            return $this->validationCustomAttributes;
        }

        return [];
    }

    /**
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validate()
    {
        $validator = Validator::make(
            $this->_getValidationData(),
            $this->_getValidationRules(),
            $this->_getValidationMessages(),
            $this->_getValidationCustomAttributes()
        );

        return $validator->validate();
    }
}

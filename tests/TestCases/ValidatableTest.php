<?php

use PHPUnit\Framework\TestCase;
use Moves\Eloquent\Validatable\Interfaces\IValidatable;
use Moves\Eloquent\Validatable\Validatable;
use Moves\TestHelpers\Models\PropertyConfigTest;
use Moves\TestHelpers\Models\MethodConfigTest;

class ValidatableTest extends TestCase
{
    /** @test */
    public function failsValidationWithoutReqPropertyAttrs()
    {
        $mock = $this->createMock("Moves\TestHelpers\Models\PropertyConfigTest");

        $mock->attributesToArray = function() {
            return [
                'last_name' => 'Dietrich'
            ];
        }
        $mock->save();

        assertEquals($errors.length, 1);
    }

    /** @test */
    public function validatesWithReqPropertyAttrs()
    {
        $mock = $this->createMock("Moves\TestHelpers\Models\PropertyConfigTest");

        $mock->attributesToArray = function() {
            return [
                'first_name' => 'Marlene',
                'last_name' => 'Dietrich'
            ];
        }
        $mock->save();

        assertEquals($errors.length, 0);
    }

    /** @test */
    public function failsValidationWithoutReqMethodAttrs()
    {
        $mock = $this->createMock("Moves\TestHelpers\Models\MethodConfigTest");

        $mock->getValidationData = function() {
            return [
                'last_name' => 'Ladd'
            ];
        };

        assertEquals($errors.length, 1);
    }

    /** @test */
    public function failsValidationWithoutReqMethodAttrs()
    {
        $mock = $this->createMock("Moves\TestHelpers\Models\MethodConfigTest");

        $mock->getValidationData = function() {
            return [
                'first_name' => 'Alan',
                'last_name' => 'Ladd'
            ];
        };

        assertEquals($errors.length, 0);
    }

    /* When both properties and getter functions are set,
    * the getter functions take priority */
    /** @test */
    public function dataAccessPriorityTest()
    {
        $mock = $this->createMock("Moves\TestHelpers\Models\PropertyConfigTest");

        $mock->getValidationData = function() {
            return [
                'first_name' => 'Veronica',
                'last_name' => 'Lake'
            ];
        };
        $mock->attributesToArray = function() {
            return [
                'first_name' => 'Alan',
                'last_name' => 'Ladd'
            ];
        };
        $data = $mock->getValidationData();

        assertEquals('Veronica', $data['first_name']);
        assertEquals('Lake', $data['last_name']);
    }
}

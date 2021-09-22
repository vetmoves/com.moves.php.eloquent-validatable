<?php

use Illuminate\Validation\ValidationException;

use Tests\TestCases\TestCase;

use Tests\Helpers\Models\MValidatableAttributes;
use Tests\Helpers\Models\MValidatableFunctions;
use Tests\Helpers\Models\MValidatableDataAccessPriority;

class ValidatableTest extends TestCase
{
    public function testValidatesOnSave()
    {
        $mock = new MValidatableAttributes();

        $this->expectException(ValidationException::class);
        $mock->save();
    }

    public function testFailsValidationWithoutReqPropertyAttrs()
    {
        $mock = new class extends MValidatableAttributes
        {
            public function attributesToArray()
            {
                return [
                    'last_name' => 'Dietrich'
                ];
            }
        };

        $this->expectException(ValidationException::class);
        $mock->save();
    }

    public function testValidatesWithReqPropertyAttrs()
    {
        $mock = new class extends MValidatableAttributes
        {
            public function attributesToArray()
            {
                return [
                    'first_name' => 'Marlene',
                    'last_name' => 'Dietrich'
                ];
            }
        };
        $mock->save();

        $this->assertEquals($mock->validate(), [
            'first_name' => 'Marlene',
            'last_name' => 'Dietrich'
        ]);
    }

    public function testFailsValidationWithoutReqMethodAttrs()
    {
        $mock = new class extends MValidatableFunctions
        {
            public function getValidationData()
            {
                return [
                    'last_name' => 'Ladd'
                ];
            }
        };

        $this->expectException(ValidationException::class);
        $mock->save();
    }

    public function testValidatesWithReqMethodAttrs()
    {
        $mock = new class extends MValidatableFunctions
        {
            public function getValidationData() {
                return [
                    'first_name' => 'Alan',
                    'last_name' => 'Ladd'
                ];
            }
        };
        $mock->save();

        $this->assertEquals($mock->validate(), [
            'first_name' => 'Alan',
            'last_name' => 'Ladd'
        ]);
    }

    /* When both properties and getter methods are configured,
    * the getter methods should take priority */
    public function testDataAccessPriorityTest()
    {
        $mock = new MValidatableDataAccessPriority();

        $data = $mock->_getValidationData();

        $this->assertArrayHasKey('first_name', $data);
        $this->assertArrayHasKey('last_name', $data);
        $this->assertEquals('Veronica', $data['first_name']);
        $this->assertEquals('Lake', $data['last_name']);
    }
}

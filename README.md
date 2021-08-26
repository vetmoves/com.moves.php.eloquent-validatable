# Eloquent Validatable
## Introduction
Eloquent Validatable is a set of functions for Eloquent models that wrap
[Laravel's Validator](https://github.com/illuminate/validation). Validate your Model classes automatically on save,
removing the need for unnecessary boilerplate in your controllers and the rest of your application code.

## Installation
To add this library into your project, run:
```
composer require moves/eloquent-validatable
```

## Usage
### Basic Configuration
Create your Eloquent Model with the Validatable interface and trait, then add your configuration settings.

```
use Moves\Eloquent\Validatable\Interfaces\IValidatable;
use Moves\Eloquent\Validatable\Validatable;

class YourModel implements IValidatable {
    use Validatable;
    
    protected $validateOnSave = true;
    protected $validationRules = [...];
    protected $validationMessages = [...];
    protected $validationCustomAttributes = [...];
}
```

To automatically validate model attributes on Eloquent save, set `$validateOnSave` to `true`. This behavior is disabled
by default.

### Advanced Configuration
For dynamic configuration, implement the configuration accessor functions instead of setting the attributes.
This allows you to apply custom logic around the values that are used in the Validator under the hood.

```
class YourModel implements IValidatable {
    use Validatable;
    
    public getValidateOnSave(): bool {
        return true;
    }
    
    public getValidationData(): array {
        return [...];
    }
    
    public getValidationRules(): array {
        return [...];
    }
    
    public getValidationMessages(): array {
        return [...];
    }
    
    public getValidationCustomAttributes(): array {
        return [...];
    }
}
```

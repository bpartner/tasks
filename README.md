# Make callable task easy

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bpartner/tasks.svg?style=flat-square)](https://packagist.org/packages/bpartner/tasks)
[![Total Downloads](https://img.shields.io/packagist/dt/bpartner/tasks.svg?style=flat-square)](https://packagist.org/packages/bpartner/tasks)

Use this trait for easy call your task

## Installation

You can install the package via composer:

```bash
composer require bpartner/tasks
```

## Usage

Create task 

``` php
namespace App\Test;

use Bpartner\Tasks\Tasks;

class Task extends Task
{
     /**
     * @param \Illuminate\Support\Fluent $object        #for Laravel
     *
     * @return mixed
     */
    public function __invoke($object)
    {
        // TODO: Implement __invoke() method.
    }
}
``` 

Use Task with CallableTrait in any class

``` php

use Illuminate\Support\Fluent;
use Illuminate\Http\Request;

class Controller
{
    use CallableTrait;

    public function index(Request $request)
    {
        $data = new Fluent($request->all());

        return $this->run(\App\Test\Tasks::class, $data); 
    }
}
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Credits

- [Alexander Zincheko](https://github.com/bpartner)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

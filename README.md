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

class Task extends Tasks
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

### Run pipeline from tasks

To start the sequence of your tasks, you must first add a trait `use PipelineTaskTrait;` to all tasks.

Implement handle method in task. 

Anywhere in the code where the CallableTrait is used, you need to create an array from the sequence of tasks,

and call `$this->runPipe($data, $pipes);` method.

``` php
namespace App\Test;

use Bpartner\Tasks\Tasks;
use Bpartner\Tasks\PipelineTaskTrait;

class Task extends Tasks
{
    use PipelineTaskTrait;

     /**
     * @param \Illuminate\Support\Fluent $object 
     *
     * @return mixed
     */
    public function __invoke($object)
    {
        // TODO: Implement __invoke() method.
    }

    /**
     * @param \Illuminate\Support\Fluent $content
     * @param \Closure                   $next
     *
     * @return mixed
     */
    public function handle(Fluent $content, Closure $next): Fluent
    {
        //Check or modify $content

        return $next($content);
    }

}

//----------------------------------------------

use Illuminate\Support\Fluent;
use Illuminate\Http\Request;

class Controller
{
    use CallableTrait;

    public function index(Request $request)
    {
        $data = new Fluent($request->all());
        $pipes = [
            \App\Test\Task::class,
            \App\Test\Task2::class
        ];

        return $this->runPipe($data, $pipes); 
    }
}
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Credits

- [Alexander Zincheko](https://github.com/bpartner)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

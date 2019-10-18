<?php
/**
 * @author Alexander Zinchenko
 *
 */

namespace Bpartner\Tasks;

use Bpartner\tasks\src\CallableTrait;

abstract class Tasks
{
    use CallableTrait;

    /**
     * @param \Illuminate\Support\Fluent $object
     *
     * @return mixed
     */
    abstract public function run($object);
}

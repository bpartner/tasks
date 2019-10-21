<?php
/**
 * @author Alexander Zinchenko
 *
 */

namespace Bpartner\Tasks;


abstract class Tasks
{
    use CallableTrait;

    /**
     * @param object $object
     *
     * @return mixed
     */
    abstract public function run($object);
}

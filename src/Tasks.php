<?php
/**
 * @author Alexander Zinchenko
 *
 */

namespace Bpartner\Tasks;


abstract class Tasks
{
    /**
     * @param object $object
     *
     * @return mixed
     */
    abstract public function __invoke($object);
}

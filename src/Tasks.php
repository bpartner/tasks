<?php
/**
 * @author Alexander Zinchenko
 *
 */

namespace Bpartner\Tasks;


abstract class Tasks
{
    /**
     * @param object | null $data
     *
     * @return mixed
     */
    abstract public function __invoke($data = null);
}

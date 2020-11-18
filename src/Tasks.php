<?php
/**
 * @author Alexander Zinchenko
 *
 */

namespace Bpartner\Tasks;


abstract class Tasks
{
    /**
     * @param object  $data
     *
     * @return mixed
     */
    abstract public function __invoke($data);
}

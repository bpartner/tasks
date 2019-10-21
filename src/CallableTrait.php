<?php
/**
 * @author Alexander Zinchenko
 *
 */

namespace Bpartner\Tasks;


use Illuminate\Container\Container;

trait CallableTrait
{
    /**
     * @param string $class
     * @param object $dto
     *
     * @return  mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function run($class, $dto)
    {
        $container = Container::getInstance();
        $task = $container->make($class);

        return $container->call($task, [$dto]);
    }
}

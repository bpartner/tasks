<?php
/**
 * @author Alexander Zinchenko
 *
 */

namespace Bpartner\Tasks;


use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Fluent;
use Psy\Exception\TypeErrorException;
use TypeError;

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

        try {
            $task = $container->make($class);
        } catch (BindingResolutionException $e) {
            throw new BindingResolutionException($e->getMessage());
        }

        return $container->call($task, [$dto]);
    }

    /**
     * @param \Illuminate\Support\Fluent $data
     * @param array                      $pipes
     *
     * @return \Illuminate\Support\Fluent|null
     * @throws \Psy\Exception\TypeErrorException
     */
    public function runPipe(Fluent $data, array $pipes): ?Fluent
    {
        try {
            return app(Pipeline::class)
                ->send($data)
                ->through($pipes)
                ->then(function ($changedData) {
                    return $changedData;
                });
        } catch (TypeError $exception) {
            throw new TypeErrorException('Handle method not defined in some pipe tasks.');
        }
    }
}

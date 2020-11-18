<?php
/**
 * @author Alexander Zinchenko
 *
 */

namespace Bpartner\Tasks;


use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Fluent;
use Psy\Exception\TypeErrorException;
use Throwable;
use TypeError;

trait CallableTrait
{
    /**
     * @param string $class
     * @param object $dto
     *
     * @return  mixed
     * @throws \Throwable
     */
    public function run(string $class, object $dto)
    {
        try {
            $task = new $class();
        } catch (Throwable $e) {
            throw $e;
        }

        return $task($dto);
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

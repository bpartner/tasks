<?php
/**
 * @author Alexander Zinchenko
 *
 */

namespace Bpartner\tasks\src;


use Illuminate\Support\Facades\App;

trait CallableTrait
{
    /**
     * @param string $class
     * @param \Illuminate\Support\Fluent $dto
     *
     * @return  mixed
     */
    public function call($class, $dto)
    {
        $action = App::make($class);

        return $action->run($dto);
    }
}

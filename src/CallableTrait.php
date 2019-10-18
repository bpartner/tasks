<?php
/**
 * @author Alexander Zinchenko
 *
 */

namespace Bpartner\Tasks;


use Illuminate\Support\Facades\App;

trait CallableTrait
{
    /**
     * @param string $class
     * @param object $dto
     *
     * @return  mixed
     */
    public function call($class, $dto)
    {
        $action = App::make($class);

        return $action->run($dto);
    }
}

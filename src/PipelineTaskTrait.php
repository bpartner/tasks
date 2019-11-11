<?php
/**
 * @author Alexander Zinchenko
 *
 */

namespace Bpartner\Tasks;


use Closure;
use Illuminate\Support\Fluent;

trait PipelineTaskTrait
{
    /**
     * @param \Illuminate\Support\Fluent $content
     * @param \Closure                   $next
     *
     * @return \Illuminate\Support\Fluent
     */
    abstract public function handle(Fluent $content, Closure $next): Fluent;
}

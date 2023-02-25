<?php

namespace App\Modules\Shared\Utils;

use Closure;

interface CanBePipedInterface
{
    public function handle($content, Closure $next);
}

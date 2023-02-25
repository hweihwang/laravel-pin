<?php

namespace App\Modules\PIN\Actions;

use App\Modules\Shared\Utils\ActionableInterface;
use Closure;
use Inertia\Inertia;

final readonly class ReturnPinResponseAction implements ActionableInterface
{
    public function handle($content, Closure $next): mixed
    {
        return Inertia::render('Home', [
            ...$content['pinConfigs'],
        ]);
    }
}

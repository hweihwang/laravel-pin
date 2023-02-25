<?php

namespace App\Modules\PIN\Actions;

use App\Modules\Shared\Utils\ActionableInterface;
use Closure;

final readonly class StorePinAction implements ActionableInterface
{
    public function handle($content, Closure $next)
    {
        session()->put('pin', $content['pin']);

        return $next([
            'pin' => $content['pin'],
            'pinConfigs' => $content['pinConfigs'],
        ]);
    }
}

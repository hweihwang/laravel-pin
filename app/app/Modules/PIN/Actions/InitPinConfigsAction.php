<?php

namespace App\Modules\PIN\Actions;

use App\Modules\Shared\Utils\ActionableInterface;
use Closure;

final readonly class InitPinConfigsAction implements ActionableInterface
{
    private const PIN_CONFIGS = [
        'length' => 6,
        'isSecret' => true,
        'disabled' => false,
        'readonly' => false,
        'defaultValue' => '',
        'regex' => '[0-9]',
        'modelDuration' => 2000,
    ];

    public function handle($content, Closure $next)
    {
        return $next([
            'pinConfigs' => self::PIN_CONFIGS,
        ]);
    }
}

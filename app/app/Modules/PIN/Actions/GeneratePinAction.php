<?php

namespace App\Modules\PIN\Actions;

use App\Modules\Shared\Utils\ActionableInterface;
use Closure;
use Exception;

final readonly class GeneratePinAction implements ActionableInterface
{
    /**
     * @throws Exception
     */
    public function handle($content, Closure $next)
    {
        //Fixed here, can be improved
        $length = $content['pinConfigs']['length'];

        $pin = (string) random_int(10 ** ($length - 1), 10 ** $length - 1);

        return $next([
            'pin' => $pin,
            'pinConfigs' => $content['pinConfigs'],
        ]);
    }
}

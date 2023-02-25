<?php

namespace App\Modules\PIN\Actions;

use App\Modules\Shared\Utils\ActionableInterface;
use Closure;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

final readonly class VerifyPinAction implements ActionableInterface
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle($content, Closure $next): mixed
    {
        $pin = session()->get('pin');
        $input = $content['pin'];

        return response()->json([
            'isMatch' => $pin === $input,
            'entered' => $input,
            'expected' => $pin,
        ]);
    }
}

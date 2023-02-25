<?php

namespace App\Modules\PIN\Transports\Handlers\Inertia;

use App\Modules\PIN\Actions\GeneratePinAction;
use App\Modules\PIN\Actions\InitPinConfigsAction;
use App\Modules\PIN\Actions\ReturnPinResponseAction;
use App\Modules\PIN\Actions\StorePinAction;
use App\Modules\PIN\Actions\VerifyPinAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Inertia\Response;

final readonly class PINHandler
{
    public function init(Pipeline $pipeline, Request $request): Response
    {
        return $pipeline->send($request->all())
            ->through([
                InitPinConfigsAction::class,
                GeneratePinAction::class,
                StorePinAction::class,
                ReturnPinResponseAction::class,
            ])
            ->thenReturn();
    }

    public function verify(Pipeline $pipeline, Request $request): JsonResponse
    {
        return $pipeline->send($request->all())
            ->through([
                VerifyPinAction::class,
            ])
            ->thenReturn();
    }
}

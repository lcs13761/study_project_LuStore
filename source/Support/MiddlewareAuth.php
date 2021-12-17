<?php


namespace Source\Support;

use Pecee\Http\Request;

use Pecee\Http\Middleware\IMiddleware;

class MiddlewareAuth implements IMiddleware
{

    public function handle(Request $request): void
    {
        $request->user = auth();
        if ($request->user === null) {
            redirect(url('login'));
        }
    }
}

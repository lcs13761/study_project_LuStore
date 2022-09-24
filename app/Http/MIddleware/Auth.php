<?php


namespace App\Http\Middleware;

use Pecee\Http\Request;
use Pecee\Http\Middleware\IMiddleware;

class Auth implements IMiddleware
{

    public function handle(Request $request): void
    {
        $request->user = auth();
        if ($request->user === null) {
            redirect(url('login'));
        }
    }
}

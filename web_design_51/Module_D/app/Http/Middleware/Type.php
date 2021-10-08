<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Type
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->header('Accept') != 'application/json'){
            return response([
                'success' => false,
                'message' => 'MSG_WROND_DATA_TYPE',
                'data' => '',
            ], 400);
        }

        return $next($request);
    }
}

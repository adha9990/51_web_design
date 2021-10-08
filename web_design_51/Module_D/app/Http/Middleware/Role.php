<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\User;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = '')
    {
        $token = $request->header('X-User-Token');
        $user = User::where('token',$token)->first();
        if(!$user){
            return response([
                'success' => false,
                'message' => 'MSG_INVALID_TOKEN',
                'data' => '',
            ], 401);
        }
        $request->user = $user;

        $permission = array_search($user->role, ['NORMAL',"ADMIN"]);
        $need_permission = array_search($role, ['NORMAL',"ADMIN"]);

        if($permission < $need_permission){
            return response([
                'success' => false,
                'message' => 'MSG_PERMISSION_DENY',
                'data' => '',
            ], 403);
        }

        return $next($request);
    }
}

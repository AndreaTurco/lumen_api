<?php
/**
 * Created by PhpStorm.
 * User: Andrea
 * Date: 27/02/2017
 * Time: 19:23
 */

namespace app\Http\Middleware;

use Closure;

class CorsMiddleware
{

    public function handle($request, Closure $next){
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'PUT, POST, DELETE')
            ->header('Access-Control-Allow-Headers', 'Accept, Content-Type,X-CSRF-TOKEN')
            ->header('Access-Control-Allow-Credentials', 'true');
    }
    
}
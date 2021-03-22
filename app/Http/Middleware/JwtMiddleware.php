<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use App\Traits\SendResponseTrait;

class JwtMiddleware
{
    use SendResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
			    return $this->apiResponse('error', 404, 'Token is Invalid');
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
			    return $this->apiResponse('error', 404, 'Token is Expired');
            }else if ($e instanceof Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
			    return $this->apiResponse('error', 405, 'Method is not allowed');
            }else{
			    return $this->apiResponse('error', 404, 'Authorization Token not found');
            }
        }
        return $next($request);
    }
}

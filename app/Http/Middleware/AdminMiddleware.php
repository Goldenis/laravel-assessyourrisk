<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AdminMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {

                return redirect()->to('auth/login');
            }
        }
        else if($this->auth->user()->rol==2)
        {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {

                return redirect()->to('admin/super');
            }
        }
        else if($this->auth->user()->rol==1)
        {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {

                return redirect()->to('admin/user');
            }
        }

        return $next($request);
    }
}

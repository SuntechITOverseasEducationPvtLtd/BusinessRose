<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AuthenticateMiddleware
{
	protected $auth;

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
		
        
		$arr_except = array();

        $admin_path = config('app.project.admin_panel_slug');

        $arr_except[] =  $admin_path;
        $arr_except[] =  $admin_path.'/login';
        $arr_except[] =  $admin_path.'/process_login';
		
        $request_path = $request->route()->getCompiled()->getStaticPrefix();
        $request_path = substr($request_path,1,strlen($request_path));
        if ($request_path != 'admin/login' && !in_array($request_path, $arr_except) && ($this->auth->guest() || $this->auth->user()->user_type != 1))
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->guest('admin/login');
            }
        }
		else if($this->auth->check() == true)
		{
			if($this->auth->user()->user_type == 1 && $request_path == 'admin')
			{
				return redirect('admin/dashboard');
			}
		}	
		
        return $next($request);
    } 
    
}

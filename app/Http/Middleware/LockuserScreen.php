<?php

namespace App\Http\Middleware;

use DB;
use Closure;
use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;
use App\Helper\UserInformation as Help;
use Illuminate\Session\Store;

class LockuserScreen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    protected $session;
    protected $timeout = 1200;

    public function __construct(Store $session){
        $this->session = $session;
    }

    public function handle($request, Closure $next, $guard = null)
    {   
        /*
         * If userlock is true $request proceed to LockScreen
        */
   
        if(! session('lastActivityTime')){

            $this->session->put('lastActivityTime', time());

        }elseif( time() - $this->session->get('lastActivityTime') > $this->timeout ){

            $this->session->forget('lastActivityTime');
         
            DB::table('users')->where('id','=',Auth::id())->update(['user_lockscreen'=>1]);

            return redirect(route('lockscreen'));

        }

        if (Auth::User()->user_lockscreen == 1) {

            Session::flash('failed','Session time-out, Please enter your password to retrieve your session');

            return redirect(route('lockscreen'));

        }

        return $next($request);
        
    }
}

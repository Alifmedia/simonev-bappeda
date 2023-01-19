<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $level)
    {
        $userLevel = Auth::user()->level;

        
        switch ($userLevel) 
        {
          case 'administrator':
            if ($userLevel == 3)
            {
                return redirect('/admin/renstra/setujuopd');
            }
            break;

            case 'superadmin':
            if ($userLevel == 4)
            {
                return redirect('/superadmin/pengguna/umum');
            }
            break;

          case 'umum':
            if ($userLevel ==1)
            {
                return redirect('/karyawan/renstra/tujuansasaran');
            }
            break;

          case 'supervisor':
            if ($userLevel == 2)
            {
                return redirect('/supervisor/renstra/setujuopd');
            }
            break;

          
            
          default:
            break;
        }

        return $next($request);
    }

    
}

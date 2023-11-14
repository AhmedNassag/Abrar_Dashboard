<?php

namespace App\Traits;

use App\Providers\RouteServiceProvider;

Trait AuthTrait
{
    public function chekGuard($request)
    {
        if($request->type == 'admin')
        {
            $guardName= 'admin';
        }
        elseif ($request->type == 'teacher')
        {
            $guardName= 'teacher';
        }
        else
        {
            $guardName= 'web';
        }
        return $guardName;
    }



    public function redirect($request)
    {
        if($request->type == 'admin')
        {
            return redirect()->intended(RouteServiceProvider::Admin);
        }
        elseif ($request->type == 'teacher')
        {
            return redirect()->intended(RouteServiceProvider::Teacher);
        }
        else
        {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}

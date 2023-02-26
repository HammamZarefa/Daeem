<?php

namespace App\Http\Middleware;

use App\Traits\General;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class VersionUpdate
{

    public function handle(Request $request, Closure $next)
    {
        $codeBuildVersion = config('app.build_version');
        $dbBuildVersion = getCustomerCurrentBuildVersion();

        return $next($request);
    }
}

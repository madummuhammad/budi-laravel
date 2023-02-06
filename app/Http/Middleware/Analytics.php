<?php

namespace App\Http\Middleware;

use App\Models\PageView;
use App\Models\AnalyticsUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Jenssegers\Agent\Agent;
use Session;

class Analytics
{
    public function handle(Request $request, Closure $next)
    {
        $uri = str_replace($request->root(), '', $request->url()) ?: '/';

        $response = $next($request);


        $session = AnalyticsUser::find(Session::getId());

        $exclude_uri = [
            '/being_read',
            '/downloaded',
            '/login',
            '/homebookfilter',
            '/dashboard',
            '/dashboard/*',
            '/images',
            '/images/*',
            '/assets',
            '/assets/*',
            '/storage',
            '/storage/*',
        ];

        $agent = new Agent();
        $agent->setUserAgent($request->headers->get('user-agent'));
        $agent->setHttpHeaders($request->headers);

        if($session){
            if(!$session->ip_address){
                $session->ip_address = $request->ip();
                $session->save();
            }

            if(!$session->device){
                $session->device = $agent->deviceType();
                $session->save();
            }
    
            if(!$session->location){
                $session->location = $agent->languages()[0] ?? 'en-en';
                $session->save();
            }
    
            if(!$session->created_at){
                $session->created_at = date('Y-m-d H:i:s');
                $session->save();
            }
        }


        foreach ($exclude_uri as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->fullUrlIs($except) || $request->is($except)) {
                return $response;
            }
        }

        // PageView::create([
        //     'session' => Session::getId(),
        //     'ip'     => $request->ip(),
        //     'uri'     => $uri,
        //     'source'  => $request->headers->get('referer'),
        //     'country' => $agent->languages()[0] ?? 'en-en',
        //     'browser' => $agent->browser() ?? null,
        //     'device'  => $agent->deviceType(),
        // ]);
        


        return $response;
    }
}
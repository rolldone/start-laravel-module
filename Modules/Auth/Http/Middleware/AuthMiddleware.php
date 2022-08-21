<?php

namespace Modules\Auth\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Http\Middleware\Authenticate as Middleware;

class AuthMiddleware extends Middleware
{
    /*  
        Catatan :
        Init khusus handle xml http request, api token. Bukan http request biasa.
        Dan Untuk Sekarang ini hanya di gunakan oleh SPA saja. Yang lain menggunakan auth.member:web, auth.member:guest 
    */
    public function handle($request, Closure $next,  ...$guards)
    {
        $key = $guards[0];
        Log::debug("key :: ", [$key]);
        switch ($key) {
            case 'backend':
                try {
                    $user = Auth::guard($key)->user();
                    if ($user == null) {
                        $response = [
                            'status_code' => 400,
                            'status' => 'error',
                            'return' => [
                                'name' => 'error.auth',
                                'message' => "Veuillez vous identifier pour accéder au backoffice" // _i("Veuillez vous identifier pour accéder au backoffice")
                            ]
                        ];
                        return Response::json($response, $response['status_code']);
                    }
                    Auth::setDefaultDriver($key);
                } catch (Exception $ex) {
                    Log::error("Error :: ", [$ex]);
                    return response()->json([
                        'status' => 'error',
                        'return' => 'You are not login yet!',
                        'redirect' => ""
                    ], 400);
                }
                break;
            case 'guest':
                // $user = Auth::guard($key)->user();
                // if ($user == null) {
                //     if ($request->ajax()) {
                //         return \response()->json([
                //             'status' => 'error',
                //             'return' => 'You are not login yet!',
                //             'redirect' => route('guest.auth.login')
                //         ], 400);
                //     }
                //     return redirect()->route('guest.auth.login', [
                //         'callback' => '/' . $request->path() . '?' . http_build_query($request->all())
                //     ]);
                // }
                // Auth::setDefaultDriver($key);
                break;
        }
        return $next($request);
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('auth.login');
        }
    }
}

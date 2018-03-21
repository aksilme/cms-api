<?php

namespace App\Modules\Auth\Controllers;

use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use Auth;

class RefreshController extends Controller
{
    /**
     * Refresh a token.
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function refresh()
    {
        $token = Auth::guard()->refresh();

        return response()->json([
            'status' => 'ok',
            'token' => $token,
            'expires_in' => Auth::guard()->factory()->getTTL() * 60
        ]);
    }
}

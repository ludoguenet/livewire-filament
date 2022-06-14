<?php

namespace App\Http\Controllers\Web\Profile;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Domains\Profile\Queries\UserProfileQuery;
use Illuminate\Contracts\Auth\Authenticatable;
use Infrastructure\Profile\Queries\UserProfileQueryContract;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(
        Authenticatable $user,
        UserProfileQueryContract $query,
    ): View {
        return view('profile.show', [
            'profile' => $query->handle($user),
        ]);
    }
}

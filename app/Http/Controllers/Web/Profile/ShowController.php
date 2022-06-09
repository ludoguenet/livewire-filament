<?php

namespace App\Http\Controllers\Web\Profile;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request): View
    {
        return view('profile.show', [
            'user' => User::query()->with(['profile'])->find(auth()->id()),
        ]);
    }
}

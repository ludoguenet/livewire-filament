<?php

namespace App\Http\Controllers\Web\Profile\Links\Template;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Link $link)
    {
        return view("profile.links.template.{$link->template}", [
            'link' => $link
        ]);
    }
}

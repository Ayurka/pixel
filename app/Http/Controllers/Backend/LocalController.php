<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($locale)
    {
        //dd($locale);
        if (array_key_exists($locale, config('locale.languages'))) {
            session()->put('locale', $locale);
        }
        return redirect()->back();
    }
}

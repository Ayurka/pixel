<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteImageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $section = Section::findOrFail($request->get('id'));

        Storage::disk('public')->delete($section->logo);

        $section->update(['logo' => '']);

        return response()->json([
            'status' => 'success'
        ]);
    }
}

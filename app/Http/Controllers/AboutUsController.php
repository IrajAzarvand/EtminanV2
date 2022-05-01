<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocaleContents;

class AboutUsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $uploaded = $request->file('file');
        $uploaded->storeAs('public\aboutus\\', 'aboutus.' . $uploaded->getClientOriginalExtension());
    }


    /**
     * Store text of about us section.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function SaveText(Request $request)
    {
        //find about us prev contents and replace with new
        $Contents = LocaleContents::where([
            'page' => 'index',
            'section' => 'aboutus',
            'element_id' => 0,
            'element_title' => 'aboutusText',
        ])->delete();

        // ad new data to about us section
        foreach (SiteLang() as $locale => $specs) {
            $Contents = LocaleContents::firstOrNew(
                [
                    'page' => 'index',
                    'section' => 'aboutus',
                    'element_id' => 0,
                    'locale' => $locale,
                    'element_title' => 'aboutusText',
                    'element_content' => $request->input('content_' . $locale),
                ]
            );
            $Contents->save();
        }

        return redirect()->back();
    }
}
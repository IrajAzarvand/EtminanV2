<?php

namespace App\Http\Controllers;

use App\Models\Flavor;
use Illuminate\Http\Request;
use App\Models\LocaleContents;

class FlavorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Flavor = new Flavor();
        $Flavor->save();
        $NewFlavor = Flavor::find($Flavor->id);


        $Contents = [];
        // add new item texts to locale contents
        foreach (SiteLang() as $locale => $specs) {
            $Contents = LocaleContents::firstOrNew(
                [
                    'page' => 'flavors',
                    'section' => 'flavors',
                    'element_title' => 'flavors',
                    'element_id' => $NewFlavor->id,
                    'locale' => $locale,
                    'element_content' => $request->input('content_' . $locale),
                ]
            );
            $Contents->save();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flavor  $flavor
     * @return \Illuminate\Http\Response
     */
    public function show(Flavor $flavor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flavor  $flavor
     * @return \Illuminate\Http\Response
     */
    public function edit(Flavor $flavor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flavor  $flavor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flavor $flavor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flavor  $flavor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flavor $flavor, Request $request)
    {
        $Item = Flavor::with('contents')->find($request->flavor);
        $Item->contents()->delete();
        $Item->delete();
        return back();
    }
}
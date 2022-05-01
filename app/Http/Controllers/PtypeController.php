<?php

namespace App\Http\Controllers;

use App\Models\Ptype;
use Illuminate\Http\Request;
use App\Models\LocaleContents;
use Illuminate\Support\Facades\File;

class PtypeController extends Controller
{
    public $PtypesTmpFolder = 'storage/images/Ptypes/tmp/';
    public $PtypesFolder = 'storage/images/Ptypes/';
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
    public function SaveText(Request $request)
    {
        $PtypeFile = File::files($this->PtypesTmpFolder);
        if ($PtypeFile) {
            $Ptype = new Ptype;
            $Ptype->save();
            $NewPtype = Ptype::find($Ptype->id);

            $p_Img = [];
            mkdir($this->PtypesFolder . $NewPtype->id);
            foreach ($PtypeFile as $key => $item) {
                $newName = $NewPtype->id . '_' . time() . '_' . $key++ . '.' . $item->getExtension();
                File::move($this->PtypesTmpFolder . $item->getFilename(), $this->PtypesFolder . $NewPtype->id . '/' . $newName);
                $p_Img[] = $newName;
            }
            $NewPtype->update(['p_image' => serialize($p_Img)]);
        } else {
            return back();
        }


        $Contents = [];
        // add new event texts to locale contents
        foreach (SiteLang() as $locale => $specs) {
            $Contents = LocaleContents::firstOrNew(
                [
                    'page' => 'ptypes',
                    'section' => 'ptypes',
                    'element_title' => 'PtypeText',
                    'element_id' => $NewPtype->id,
                    'locale' => $locale,
                    'element_content' => $request->input('content_' . $locale),
                ]
            );
            $Contents->save();
        }

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uploaded = $request->file('file');
        $uploaded->storeAs('public\images\Ptypes\tmp\\', $uploaded->getClientOriginalName());
    }





    /**
     * Update text of ptypes section.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function UpdateText(Request $request)
    {

        $SelectedItem = Ptype::with('Contents')->find($request->input('SelectedItemId'));
        // Edit ptype texts in locale contents
        foreach (SiteLang() as $locale => $specs) {
            $content = $SelectedItem->contents()->where('locale', $locale)->get()[0];
            $content->element_content = $request->input('content_' . $locale . '_Edit');
            $content->save();
        }
        return redirect()->back();
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ptype  $ptype
     * @return \Illuminate\Http\Response
     */
    public function show(Ptype $ptype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ptype  $ptype
     * @return \Illuminate\Http\Response
     */
    public function edit(Ptype $ptype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ptype  $ptype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ptype $ptype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ptype  $ptype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ptype $ptype)
    {
        //
    }

    /**
     * Remove the selected image from dropzone box and tmp folder.
     */
    public function DelTmp($name)
    {
        unlink($this->PtypesTmpFolder . $name);
        return true;
    }
}
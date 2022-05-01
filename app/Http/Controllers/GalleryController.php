<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\LocaleContents;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public $GalleryTmpFolder = 'storage/images/Gallery/tmp/';
    public $GalleryFolder = 'storage/images/Gallery/';

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
        $uploaded = $request->file('file');

        $uploaded->storeAs('public\images\Gallery\tmp\\', $uploaded->getClientOriginalName());
    }


    /**
     * Store gallery section text in db.
     * title and text should separate by enter key.
     *
     * @return \Illuminate\Http\Response
     */
    public function SaveText(Request $request, $Gallery_id = '')
    {
        // create new gallery
        $GalleryFile = File::files($this->GalleryTmpFolder);


        if ($GalleryFile) {
            $Gallery = new Gallery;
            $Gallery->save();

            $g_img = [];
            mkdir($this->GalleryFolder . $Gallery->id);

            $NewGallery = Gallery::find($Gallery->id);



            $i = 0;
            foreach ($GalleryFile as $key => $item) {
                $newName = $NewGallery->id . '_' . time() . '_' . $i++ . '.' . $item->getExtension();
                File::move($this->GalleryTmpFolder . $item->getFilename(), $this->GalleryFolder . $NewGallery->id . '/' . $newName);
                $g_img[] = $newName;
            }
            $NewGallery->update(['g_img' => serialize($g_img)]);
        } else {
            return back();
        }

        // add new product texts to locale contents
        foreach (SiteLang() as $locale => $specs) {

            // $GalleryText = array_values(array_filter(preg_split("/[\r\n]/", $request->input('content_' . $locale))));

            // $G_Title = trim($GalleryText[0]);
            // $G_Description = trim($GalleryText[1]);

            $NewGallery->contents()->saveMany([
                new LocaleContents([
                    'page' => 'gallery',
                    'section' => 'gallery',
                    'element_title' => 'Title',
                    'element_id' => $NewGallery->id,
                    'locale' => $locale,
                    'element_content' => $request->input('content_' . $locale),
                ]),
            ]);
        }

        return redirect()->route('ShowGalleryPage');
    }




    /**
     * Update text of gallery section.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function UpdateText(Request $request)
    {

        $SelectedItem = Gallery::with('Contents')->find($request->input('SelectedItemId'));
        // Edit gallery texts in locale contents
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
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
    }

    /**
     * Remove the selected image from dropzone box and tmp folder.
     */
    public function DelTmp($name)
    {
        unlink($this->GalleryTmpFolder . $name);
        return true;
    }
}
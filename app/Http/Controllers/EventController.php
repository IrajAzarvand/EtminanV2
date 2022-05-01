<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\LocaleContents;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    public $EventsTmpFolder = 'storage/images/Events/tmp/';
    public $EventsFolder = 'storage/images/Events/';
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
        $uploaded->storeAs('public\images\Events\tmp\\', $uploaded->getClientOriginalName());
    }

    /**
     * Store text of events section.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function SaveText(Request $request)
    {
        $EventFiles = File::files($this->EventsTmpFolder);
        if ($EventFiles) {
            $Event = new Event;
            $Event->save();
            $NewEvent = Event::find($Event->id);

            $ImgList = [];
            mkdir($this->EventsFolder . $NewEvent->id);
            foreach ($EventFiles as $key => $item) {
                $newName = $NewEvent->id . '_' . time() . '_' . $key++ . '.' . $item->getExtension();
                File::move($this->EventsTmpFolder . $item->getFilename(), $this->EventsFolder . $NewEvent->id . '/' . $newName);
                $ImgList[] = $newName;
            }
            $NewEvent->update(['e_image' => serialize($ImgList)]);
        } else {
            return back();
        }


        $Contents = [];
        // add new event texts to locale contents
        foreach (SiteLang() as $locale => $specs) {
            $Contents = LocaleContents::firstOrNew(
                [
                    'page' => 'events',
                    'section' => 'events',
                    'element_title' => 'EventText',
                    'element_id' => $NewEvent->id,
                    'locale' => $locale,
                    'element_content' => $request->input('content_' . $locale),
                ]
            );
            $Contents->save();
        }

        return redirect()->back();
    }





    /**
     * Update text of events section.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function UpdateText(Request $request)
    {
        $SelectedItem = Event::with('Contents')->find($request->input('SelectedItemId'));

        // Edit event texts in locale contents
        foreach (SiteLang() as $locale => $specs) {
            $content = $SelectedItem->contents()->where('locale', $locale)->get()[0];
            $content->element_content = $request->input('content_' . $locale . '_Edit');
            $content->save();
        }
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function EImgRemove($eventImg)
    {
        unlink($this->EventsTmpFolder . $eventImg);
    }


    /**
     * Remove the selected image from dropzone box and tmp folder.
     */
    public function DelTmp($name)
    {
        unlink($this->EventsTmpFolder . $name);
        return true;
    }
}
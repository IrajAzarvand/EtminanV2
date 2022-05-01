<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Ptype;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class SectionItem extends Component
{
    use WithFileUploads;

    public $CurrentPage;
    public $Section = '';

    public $EventItem;
    public $SelectedItemId;
    public $SelectedImgId;
    public $Slider;
    public $AUItem;
    public $PtypeItem;
    public $ProductItem;
    public $GalleryItem;

    protected $listeners = [
        'EditSelectedItem',
        'ImgRemoveConfirmed',
        'ItemRemoveConfirmed',
    ];

    //------------------------------ Common
    public $SelectedItem;
    public $Data;
    public $AboutUsItemPath = 'storage/aboutus/';
    public $EventsItemPath = 'storage/images/Events/';
    public $PtypeItemPath = 'storage/images/Ptypes/';
    public $ProductItemPath = 'storage/images/Products/';
    public $GalleryItemPath = 'storage/images/Gallery/';





    public function EditSelectedItem($ItemId)
    {

        $this->Section = 'Edit';
        $this->SelectedItem = [];
        $this->Data = [];
        switch ($this->CurrentPage) {

            case 'Events':

                $Item = Event::where('id', $ItemId)->with('contents')->first();

                $this->SelectedItem['id'] = $Item->id;
                $EventText = array_values(array_filter(preg_split("/[\r\n]/", $Item->contents()->where('locale', 'FA')->pluck('element_content')->get(0))));
                $this->SelectedItem['title'] = $EventText[0];

                foreach (SiteLang() as $locale => $specs) {
                    $this->Data['content_' . $locale . '_' . $this->Section] = $Item->contents()->where('locale', $locale)->pluck('element_content')->get(0);
                }

                $imgs = unserialize($Item->e_image);

                if ($imgs) {

                    foreach ($imgs as $key => $item) {
                        $this->SelectedItem['images'][$key] = asset($this->EventsItemPath . $Item->id . '/' . $item);
                    }
                } else {
                    $this->SelectedItem['images'] = [];
                }
                break;

            case 'Ptypes':
                $Item = Ptype::where('id', $ItemId)->with('contents')->first();

                $this->SelectedItem['id'] = $Item->id;
                $this->SelectedItem['title'] = $Item->contents()->where('locale', 'FA')->pluck('element_content')[0];

                foreach (SiteLang() as $locale => $specs) {
                    $this->Data['content_' . $locale . '_' . $this->Section] = $Item->contents()->where('locale', $locale)->pluck('element_content')->get(0);
                }

                $imgs = unserialize($Item->p_image);

                if ($imgs) {

                    foreach ($imgs as $key => $item) {
                        $this->SelectedItem['images'][$key] = asset($this->PtypeItemPath . $Item->id . '/' . $item);
                    }
                } else {
                    $this->SelectedItem['images'] = [];
                }
                break;

            case 'NewProduct':
                $Item = Product::where('id', $ItemId)->with('contents')->first();

                $this->SelectedItem['id'] = $Item->id;
                $this->SelectedItem['title'] = $Item->contents()->where('locale', 'FA')->pluck('element_content')[0];

                foreach (SiteLang() as $locale => $specs) {
                    $this->Data['content_' . $locale . '-' . $this->Section] = $Item->contents()->where('locale', $locale)->pluck('element_content')->get(0);
                }

                $imgs = unserialize($Item->p_image);

                if ($imgs) {

                    foreach ($imgs as $key => $item) {
                        $this->SelectedItem['images'][$key] = asset($this->PtypeItemPath . $Item->id . '/' . $item);
                    }
                } else {
                    $this->SelectedItem['images'] = [];
                }
                break;


            case 'Gallery':
                $Item = Gallery::where('id', $ItemId)->with('contents')->first();

                $this->SelectedItem['id'] = $Item->id;

                // $this->SelectedItem['title'] = $Item->contents()->where('locale', 'FA')->pluck('element_content')[0];
                $this->SelectedItem['title'] = array_values(array_filter(preg_split("/[\r\n]/", $Item->contents()->where('locale', 'FA')->pluck('element_content')[0])))[0];

                foreach (SiteLang() as $locale => $specs) {
                    $this->Data['content_' . $locale . '-' . $this->Section] = $Item->contents()->where('locale', $locale)->pluck('element_content')->get(0);
                }

                $imgs = unserialize($Item->g_img);

                if ($imgs) {

                    foreach ($imgs as $key => $item) {
                        $this->SelectedItem['images'][$key] = asset($this->GalleryItemPath . $Item->id . '/' . $item);
                    }
                } else {
                    $this->SelectedItem['images'] = [];
                }
                break;
        }
    }



    public $ItemNewImages;

    public function ItemAddNewImage($ItemId)
    {
        switch ($this->CurrentPage) {

                //------------------------------ Events
            case 'Events':
                $Item = Event::where('id', $ItemId)->with('contents')->first();
                $eventImages = unserialize($Item->e_image);

                $lastkey = $eventImages ? array_key_last($eventImages) : 0;
                foreach ($this->ItemNewImages as $newimg) {

                    $lastkey += 1;
                    $newName = $Item->id . '_' . time() . '_' . $lastkey . '.' . $newimg->getClientOriginalExtension();
                    File::move($newimg->path(), $this->EventsItemPath . $Item->id . '/' . $newName);
                    array_push($eventImages, $newName);
                }
                $Item->update(['e_image' => serialize($eventImages)]);
                $this->dispatchBrowserEvent('swal:Success');

                break;

                //------------------------------ Ptypes
            case 'Ptypes':
                $Item = Ptype::where('id', $ItemId)->with('contents')->first();
                $ptypeImage = unserialize($Item->p_image)[0];

                if (File::exists($this->PtypeItemPath . $Item->id . '/' . $ptypeImage)) {
                    unlink($this->PtypeItemPath . $Item->id . '/' . $ptypeImage);
                }
                $newName[0] = $Item->id . '_' . time() . '_0' . '.' . $this->ItemNewImages->getClientOriginalExtension();
                File::move($this->ItemNewImages->path(), $this->PtypeItemPath . $Item->id . '/' . $newName[0]);
                $Item->update(['p_image' => serialize($newName)]);
                $this->dispatchBrowserEvent('swal:Success');

                break;

                //------------------------------ Gallery
            case 'Gallery':

                $Item = Gallery::where('id', $ItemId)->with('contents')->first();

                $GalleryImages = unserialize($Item->g_img);

                $i = 0;
                foreach ($this->ItemNewImages as $newimg) {


                    $newName = $Item->id . '_' . time() . '_' . $i++ . '.' . $newimg->getClientOriginalExtension();
                    File::move($newimg->path(), $this->GalleryItemPath . $Item->id . '/' . $newName);
                    array_push($GalleryImages, $newName);
                }
                $Item->update(['g_img' => serialize($GalleryImages)]);
                $this->dispatchBrowserEvent('swal:Success');

                break;
        }
    }

    //=======================================================================================================
    public function RemoveSelectedItem($ItemId)
    {

        $this->dispatchBrowserEvent('swal:itemDelConfirm', [
            'ElementId' => '',
            'ItemId' => $ItemId,
            'callback' => 'ItemRemoveConfirmed',

        ]);
    }

    public function ItemRemoveConfirmed($E)
    {
        switch ($this->CurrentPage) {

            case 'Events':
                $SelectedItemId = $E[1];
                $SelectedEvent = Event::where('id', $SelectedItemId)->with('contents')->first();
                $SelectedEvent->contents()->delete();
                $SelectedEvent->delete();
                File::deleteDirectory($this->EventsItemPath . $SelectedItemId);
                $this->emit('ReloadItems');
                break;

            case 'AboutUs':


                $SelectedFile = File::files($this->AboutUsItemPath)[$E[1]];
                unlink($SelectedFile->getPathname());
                $this->emit('ReloadItems');
                $this->dispatchBrowserEvent('swal:DeleteSuccess');
                break;

            case 'Ptypes':
                $SelectedItemId = $E[1];
                $SelectedPtype = Ptype::where('id', $SelectedItemId)->with('contents')->first();
                $SelectedPtype->contents()->delete();

                $SelectedPtype->delete();
                File::deleteDirectory($this->PtypeItemPath . $SelectedItemId);
                $this->emit('ReloadItems');
                break;

            case 'NewProduct':

                $SelectedItemId = $E[1];
                $SelectedProduct = Product::where('id', $SelectedItemId)->with('contents')->first();

                $SelectedProduct->contents()->delete();
                $SelectedProduct->delete();
                File::deleteDirectory($this->ProductItemPath . $SelectedItemId);
                $this->emit('ReloadItems');
                break;


            case 'Gallery':

                $SelectedItemId = $E[1];
                $SelectedGallery = Gallery::where('id', $SelectedItemId)->with('contents')->first();
                $SelectedGallery->contents()->delete();
                $SelectedGallery->delete();
                File::deleteDirectory($this->GalleryItemPath . $SelectedItemId);
                $this->emit('ReloadItems');
                break;
        }
    }

    //=======================================================================================================

    public function RemoveItemImage($El_Id, $Img_Id)
    {


        $this->dispatchBrowserEvent('swal:itemDelConfirm', [
            'ElementId' => $El_Id,
            'ItemId' => $Img_Id,
            'callback' => 'ImgRemoveConfirmed',

        ]);
    }

    public function ImgRemoveConfirmed($E)
    {
        switch ($this->CurrentPage) {

                // case 'AboutUs':
                //     // $PendingJob = 1;  //this will prevent to remove all files is same folder, and force to do the job for 1 time.
                //     $SelectedFile = File::files($this->AboutUsItemPath)[$E[0]];
                //     dd($SelectedFile);
                //     // if ($PendingJob) {
                //     unlink($SelectedFile->getPathname());
                //     $PendingJob = 0;
                //     // }
                //     $this->emit('ReloadItems');

                //     break;

            case 'Events':
                $SelectedEventId = $E[0];
                $SelectedImgId = $E[1];

                $SelectedEvent = Event::find($SelectedEventId);
                $eventImages = unserialize($SelectedEvent->e_image);
                unlink($this->EventsItemPath . $SelectedEventId . '/' . $eventImages[$SelectedImgId]);
                unset($eventImages[$SelectedImgId]);
                $SelectedEvent->e_image = serialize($eventImages);
                $SelectedEvent->save();
                $this->emit('ReloadItems');

                break;

            case 'Gallery':
                $SelectedGalleryId = $E[0];
                $SelectedImgId = $E[1];
                $SelectedGallery = Gallery::find($SelectedGalleryId);
                $GalleryImages = unserialize($SelectedGallery->g_img);
                unlink($this->GalleryItemPath . $SelectedGalleryId . '/' . $GalleryImages[$SelectedImgId]);
                unset($GalleryImages[$SelectedImgId]);
                $SelectedGallery->g_img = serialize($GalleryImages);

                $SelectedGallery->save();
                $this->emit('ReloadItems');

                break;
        }
    }

    //================================================================================================
    public function CancelEdit()
    {
        $this->emit('ReloadItems');
    }




    public function mount($Slider = '', $AUItem = '', $EventItem = '', $ProductItem = '', $GalleryItem = '')
    {

        switch ($this->CurrentPage) {
            case 'Slider':
                $this->Items = $Slider;
                break;

            case 'AboutUs':
                $this->AUItem = $AUItem;
                break;

            case 'Events':
                $this->EventItem = $EventItem;
                break;

            case 'NewProduct':
                $this->ProductItem = $ProductItem;
                break;

            case 'Gallery':
                $this->GalleryItem = $GalleryItem;
                break;
        }
    }




    public function render()
    {
        return view('livewire.section-item');
    }
}
<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Ptype;
use App\Models\Flavor;
use App\Models\Gallery;
use App\Models\Weight;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SectionSetting extends Component
{

    public $CurrentPage;
    public $Section = '';
    public $ElementId;
    public $ItemId;



    protected $listeners = [
        'ReloadItems',
        'DestroyItem',
        'DestroyChildItem',


    ];

    //------------------------------ Sliders

    public $Sliders;
    public $SliderPath = 'storage/images/background/';
    public function Slider()
    {
        $this->Sliders = [];

        $this->CurrentPage = 'Slider';

        $SliderFiles = File::files($this->SliderPath);
        if ($SliderFiles) {
            foreach ($SliderFiles as $key => $item) {
                $this->Sliders[$key]['id'] = $key;
                $this->Sliders[$key]['filePath'] = asset($item->getPathname());
                $this->Sliders[$key]['name'] = $item->getFilename();
            }
        }
    }






    //------------------------------ Events
    public $EventItems;
    public $EventsItemPath = 'storage/images/Events/';

    public function Events()
    {
        $this->CurrentPage = 'Events';

        $this->EventItems = [];
        $EventList = Event::with('contents')->orderBy('id', 'DESC')->get();
        foreach ($EventList as $key => $Event) {
            $this->EventItems[$key]['id'] = $Event->id;
            $EImgs = unserialize($Event->e_image);
            if ($EImgs) {

                foreach ($EImgs as $img) {
                    $this->EventItems[$key]['image'][] = asset($this->EventsItemPath . $Event->id . '/' . $img);
                }
            }
            $EventText = array_values(array_filter(preg_split("/[\r\n]/", $Event->contents()->where('locale', 'FA')->pluck('element_content')->get(0))));
            $this->EventItems[$key]['title'] = $EventText[0];
        }
        $this->render();
    }






    //------------------------------ Ptypes
    public $PtypeItems;
    public $PtypeItemPath = 'storage/images/Ptypes/';

    public function Ptypes()
    {
        $this->CurrentPage = 'Ptypes';

        $this->PtypeItems = [];
        $PtypeList = Ptype::with('contents')->orderBy('id', 'DESC')->get();

        foreach ($PtypeList as $key => $Ptype) {

            $this->PtypeItems[$key]['id'] = $Ptype->id;

            $this->PtypeItems[$key]['image'] = asset($this->PtypeItemPath . $Ptype->id . '/' . unserialize($Ptype->p_image)[0]);

            $this->PtypeItems[$key]['title'] = $Ptype->contents()->where('locale', 'FA')->pluck('element_content')[0];
        }
        $this->render();
    }




    //------------------------------ About Us
    public $AboutUsItems;
    public $AboutUsItemPath = 'storage/aboutus/';

    public function AboutUs()
    {
        $this->CurrentPage = 'AboutUs';
        //image and videos
        $AboutUsFiles = File::files($this->AboutUsItemPath);

        if ($AboutUsFiles) {
            foreach ($AboutUsFiles as $key => $item) {
                $this->AboutUsItems['items'][$key]['id'] = $key;
                $this->AboutUsItems['items'][$key]['filePath'] = asset($item->getPathname());
                $this->AboutUsItems['items'][$key]['name'] = $item->getFilename();
            }
        }

        //text of this section loads from dashboardpageloader controller


    }






    //------------------------------ New Product
    public $ProductItems;
    public $ProductItemPath = 'storage/images/Products/';

    public function NewProduct()
    {
        $this->CurrentPage = 'NewProduct';

        $this->ProductItems = [];
        $ProductList = Product::with('contents')->get();


        foreach ($ProductList as $item) {
            $this->ProductItems[$item->id]['id'] = $item->id;
            $this->ProductItems[$item->id]['ptype'] = Ptype::find($item->ptype_id)->contents()->where('locale', 'FA')->pluck('element_content')[0];
            $this->ProductItems[$item->id]['weight'] = Weight::where('id', $item->weight_id)->pluck('weight')[0];
            $this->ProductItems[$item->id]['flavor'] = Flavor::find($item->flavor_id)->contents()->where('locale', 'FA')->pluck('element_content')[0];
            $this->ProductItems[$item->id]['intro'] = Product::find($item->id)->contents()->where(['locale' => 'FA', 'element_title' => 'ProductIntro'])->pluck('element_content')[0];
            $this->ProductItems[$item->id]['nutrition'] = Product::find($item->id)->contents()->where(['locale' => 'FA', 'element_title' => 'ProductNutrition'])->pluck('element_content')[0];
        }

        $this->render();
    }






    //------------------------------ Gallery
    public $GalleryItems;
    public $GalleryItemPath = 'storage/images/Gallery/';

    public function Gallery()
    {
        $this->CurrentPage = 'Gallery';

        $this->GalleryItems = [];
        $GalleryList = Gallery::with('contents')->orderBy('id', 'DESC')->get();

        foreach ($GalleryList as $key => $gallery) {
            // dd(unserialize($gallery->g_img));
            $this->GalleryItems[$key]['id'] = $gallery->id;

            $this->GalleryItems[$key]['image'] = asset($this->PtypeItemPath . $gallery->id . '/' . array_key_first(unserialize($gallery->g_img)));

            $this->GalleryItems[$key]['title'] = array_values(array_filter(preg_split("/[\r\n]/", $gallery->contents()->where('locale', 'FA')->pluck('element_content')[0])))[0];
        }

        $this->render();
    }









    //------------------------------ Common

    //reload slider images after saving or removing images
    public function ReloadItems()
    {
        return redirect('/dashboard/' . $this->CurrentPage);
    }


    public function mount($CurrentPage = '')
    {
        $this->CurrentPage = $CurrentPage ? $CurrentPage : last(request()->segments());

        switch ($this->CurrentPage) {
            case 'Slider':
                $this->Slider();
                break;

            case 'AboutUs':
                $this->AboutUs();
                break;

            case 'Events':
                $this->Events();
                if (Session::exists('EditSection')) {
                    $this->emit('EditSelectedItem', Session::get('EditSection'));
                }
                break;

            case 'Ptypes':
                $this->Ptypes();
                if (Session::exists('EditSection')) {
                    $this->emit('EditSelectedItem', Session::get('EditSection'));
                }
                break;

            case 'NewProduct':
                $this->NewProduct();
                if (Session::exists('EditSection')) {
                    $this->emit('EditSelectedItem', Session::get('EditSection'));
                }
                break;


            case 'Gallery':
                $this->Gallery();
                if (Session::exists('EditSection')) {
                    $this->emit('EditSelectedItem', Session::get('EditSection'));
                }
                break;
        }
    }

    public function render()
    {
        return view('livewire.section-setting');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ptype;
use App\Models\Flavor;
use App\Models\Weight;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\LocaleContents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardPageLoader extends Controller
{

    public function dashboard()
    {

        // if (Auth::user()->email == 'admin@admin.com') {

        return view('PageElements.dashboard.Setting.index');
        // } else {
        //     echo 'this is not the admin user';
        // }
    }


    public function LangSetting()
    {
        return view('PageElements.dashboard.Setting.LangSetting');
    }

    public function Slider()
    {
        $Name = Menu('ShowSliderSettingPage')[0];
        $Section = Menu('ShowSliderSettingPage')[1];

        return view('PageElements.dashboard.Setting.SliderSetting', compact('Name', 'Section'));
    }



    public function AboutUs()
    {

        $Name = Menu('ShowAboutUspage')[0];
        $Section = Menu('ShowAboutUspage')[1];

        $Contents = [];
        $Contents = LocaleContents::where([
            'page' => 'index',
            'section' => 'aboutus',
            'element_id' => 0,
            'element_title' => 'aboutusText',
        ])->get();

        foreach (SiteLang() as $locale => $specs) {
            $Data['content_' . $locale . '_' . $Section] = '';
            foreach ($Contents as $item) {
                if ($item->locale == $locale) {
                    $Data['content_' . $locale . '_' . $Section] = $item->element_content;
                }
            }
        }



        return view('PageElements.dashboard.Setting.AboutUsSetting', compact('Name', 'Section', 'Data'));
    }


    public function Events()
    {
        $Name = Menu('ShowEventspage')[0];
        $Section = Menu('ShowEventspage')[1];

        return view('PageElements.dashboard.Setting.EventsSetting', compact('Name', 'Section'));
    }


    public function Ptypes()
    {
        $Name = Menu('ShowPTypepage')[0];
        $Section = Menu('ShowPTypepage')[1];
        return view('PageElements.dashboard.Setting.ProductsPTypeSetting', compact('Name', 'Section'));
    }


    public function GetFlavors()
    {
        $Flavors = Flavor::with('contents')->get();
        $Fl = [];
        foreach ($Flavors as $key => $item) {
            $Fl[$item->id] = $item->contents()->where('locale', 'FA')->pluck('element_content')[0];
        }
        asort($Fl);
        return $Fl;
    }



    public function GetPtypes()
    {
        $Ptypes = Ptype::with('contents')->get();
        $Pt = [];
        foreach ($Ptypes as $key => $item) {
            $Pt[$item->id] = $item->contents()->where('locale', 'FA')->pluck('element_content')[0];
        }
        asort($Pt);
        return $Pt;
    }



    public function GetWeights()
    {
        $Weight = Weight::all()->pluck('weight', 'id');
        $We = [];
        foreach ($Weight as $key => $item) {
            $We[$key] = $item;
        }
        asort($We);
        return $We;
    }


    public function WeightFlavor()
    {
        $Name = Menu('ShowWeightFlavorPage')[0];
        $Section = Menu('ShowWeightFlavorPage')[1];


        //  ============================================
        $FlavorItems = $this->GetFlavors();
        $WeightItems = $this->GetWeights();
        //  ============================================


        return view('PageElements.dashboard.Setting.ProductsWeightFlavorSetting', compact('Name', 'Section', 'FlavorItems', 'WeightItems'));
    }




    public function NewProduct()
    {
        $Name = Menu('ShowNewProductPage')[0];
        $Section = Menu('ShowNewProductPage')[1];

        //  ============================================
        $FlavorItems = $this->GetFlavors();
        $WeightItems = $this->GetWeights();
        $PtypeItems = $this->GetPtypes();

        //  ============================================


        return view('PageElements.dashboard.Setting.NewProduct', compact('Name', 'Section', 'FlavorItems', 'WeightItems', 'PtypeItems'));
    }


    public function Gallery()
    {
        $Name = Menu('ShowGalleryPage')[0];
        $Section = Menu('ShowGalleryPage')[1];

        return view('PageElements.dashboard.Setting.Gallery', compact('Name', 'Section'));
    }


    public function AddUser()
    {
        $Name = Menu('ShowAddUserPage')[0];
        $Section = Menu('ShowAddUserPage')[1];

        $RoleList = [];
        $RoleList = Role::all();

        $UsersList = [];
        $UsersList = User::all();


        return view('PageElements.dashboard.Setting.AddUser', compact('Name', 'Section', 'RoleList', 'UsersList'));
    }
}
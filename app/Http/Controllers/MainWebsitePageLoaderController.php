<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Event;
use App\Models\Flavor;
use App\Models\Gallery;
use App\Models\Ptype;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\LocaleContents;
use App\Models\Weight;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MainWebsitePageLoaderController extends Controller
{
    public $ProductsImageFolder = 'storage/images/Products/';

    //set website locale to user selected
    public function SetLocale(string $langsymbol)
    {
        $NeedDirection = ['index']; //pages that needs ?dir=... at the end of address bar
        $prev_url = url()->previous();
        $SpecialAddress = false; //pretend that the current address dont need ?dir for default

        foreach ($NeedDirection as $page) {
            $SpecialAddress = Str::contains($prev_url, $NeedDirection);

            if ($SpecialAddress) {
                break;
            }
        }



        $TrimmedUrl = trim($prev_url, '?dir=rtl');
        $RawUrl = trim($TrimmedUrl, '?dir=ltr');
        Session::put('locale', $langsymbol);

        $SiteLang = SiteLang();

        if ($SpecialAddress) {
            if ($SiteLang[$langsymbol]['rtl']) {
                return redirect($RawUrl . '?dir=rtl');
            } else {
                return redirect($RawUrl . '?dir=ltr');
            }
        } else {
            return redirect($RawUrl);
        }
    }

    //Main Website
    public function IndexPage()
    {
        // dd(request()->getHost());
        // $envpath = base_path('.env');
        // dd($envpath);
        // if (file_exists($envpath)) {
        //     if (request()->getHost() == 'etminan-icecream.com') {
        //         file_put_contents(app()->environmentFilePath(), str_replace(
        //             env('RECAPTCHA_SITE_KEY'),
        //             'RECAPTCHA_SITE_KEY' . '=' . 'MTPublic-bVcrTAPNk',
        //             file_get_contents(app()->environmentFilePath())

        //         ));
        //         file_put_contents(app()->environmentFilePath(), str_replace(
        //             env('RECAPTCHA_SECRET_KEY'),
        //             'RECAPTCHA_SECRET_KEY' . '=' . 'MTPrivat-bVcrTAPNk-2Z9EUCOPTKBWhzm7PoCUpnCieZ7NgWez3yISK3Z4L1A3nKsE6Y',
        //             file_get_contents(app()->environmentFilePath())

        //         ));



        //         // file_put_contents($envpath, str_replace(
        //         //     'RECAPTCHA_SITE_KEY' . '=' . 'MTPublic-bVcrTAPNk',
        //         //     'RECAPTCHA_SECRET_KEY' . '=' . 'MTPrivat-bVcrTAPNk-2Z9EUCOPTKBWhzm7PoCUpnCieZ7NgWez3yISK3Z4L1A3nKsE6Y',
        //         //     file_get_contents($envpath)
        //         // ));
        //     } elseif (request()->getHost() == 'etminan.net') {
        //         file_put_contents(app()->environmentFilePath(), str_replace(
        //             env('RECAPTCHA_SITE_KEY'),
        //             'RECAPTCHA_SITE_KEY' . '=' . 'MTPublic-WgOjDYDxk',
        //             file_get_contents(app()->environmentFilePath())

        //         ));
        //         file_put_contents(app()->environmentFilePath(), str_replace(
        //             env('RECAPTCHA_SECRET_KEY'),
        //             'RECAPTCHA_SECRET_KEY' . '=' . 'MTPrivat-WgOjDYDxk-CjH656T3bAjEOpQH2wm9PE1QTqg7pW4Ow0Ks5TLxSiQaVgypJG',
        //             file_get_contents(app()->environmentFilePath())

        //         ));






        //         // file_put_contents($envpath, str_replace(
        //         //     'RECAPTCHA_SITE_KEY' . '=' . 'MTPublic-WgOjDYDxk',
        //         //     'RECAPTCHA_SECRET_KEY' . '=' . 'MTPrivat-WgOjDYDxk-CjH656T3bAjEOpQH2wm9PE1QTqg7pW4Ow0Ks5TLxSiQaVgypJG',
        //         //     file_get_contents($envpath)
        //         // ));
        //     }
        // }


        // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
        //about us section
        //about us picture or video
        $AboutUsItemPath = 'storage/aboutus/';
        // $AboutUsItem = ['video' => '', 'image' => ''];
        $AboutUsItem['image'] = [];
        $AboutUsItem['video'] = [];
        $AboutUsFiles = File::files($AboutUsItemPath);

        if ($AboutUsFiles) {
            foreach ($AboutUsFiles as $key => $item) {
                if (File::extension($item->getFilename()) == 'jpg') {
                    $AboutUsItem['image'] = asset($item->getPathname());
                } else {
                    $AboutUsItem['video'] = asset($item->getPathname());
                }
            }
        }

        $Contents = [];
        //about us text
        $Contents = LocaleContents::where([
            'page' => 'index',
            'section' => 'aboutus',
            'element_id' => 0,
            'element_title' => 'aboutusText',
        ])->get();

        if ($Contents) {
            $AboutUsText = [];
            foreach (SiteLang() as $locale => $specs) {
                foreach ($Contents as $item) {
                    if ($item->locale == $locale) {
                        $AboutUsText['content_' . $locale] = $item->element_content;
                    }
                }
            }
        }
        // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
        // Events Section

        // Events title and descriptions

        $EventList = Event::with('contents')->orderBy('id', 'DESC')->take(6)->get();

        if ($EventList) {
            $Events = [];

            foreach ($EventList as $key => $Event) {
                $Events[$key]['id'] = $Event->id;
                $EImgs = unserialize($Event->e_image);

                if ($EImgs) {
                    foreach ($EImgs as $img) {
                        $Events[$key]['image'][] = asset('storage/images/Events/' . $Event->id . '/' . $img);
                    }
                } else {
                    $Events[$key]['image'][] = asset('storage/images/logo/etminanlogo.png');
                }
                foreach (SiteLang() as $locale => $specs) {
                    $EventText = array_values(array_filter(preg_split("/[\r\n]/", $Event->contents->where('locale', $locale)->pluck('element_content')[0])));
                    $Events[$key]['EventTitle_' . $locale] = isset($EventText[0]) ? $EventText[0] : '';
                    $Events[$key]['EventDescription_' . $locale] = isset($EventText[1]) ? $EventText[1] : '';
                }
            }
        }


        // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
        // Certificates Section
        $CertificateItemPath = 'storage/images/Certificates/';
        $CertificateItems = [];
        $CertificateFiles = File::files($CertificateItemPath);
        if ($CertificateFiles) {
            foreach ($CertificateFiles as $key => $item) {
                $CertificateItems[$key] = asset($CertificateItemPath . $item->getFilename());
            }
        }


        // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
        // New Products Section
        $NP = [];
        $NewProducts = [];

        $Ptypes = Ptype::all();
        foreach ($Ptypes as $pt) {
            $NewProducts[] = Product::with('contents')->where('ptype_id', $pt->id)->latest()->take(1)->get();
        }


        foreach ($NewProducts as $key => $Item) {
            foreach ($Item as $Prod) {
                $NP[$key]['id'] = $Prod->id;
                $NP[$key]['image'] = asset($this->ProductsImageFolder .  $Prod->id . '/sample.jpg');
                $NP_Ptype = Ptype::where('id', $Prod->ptype_id)->with('contents')->first();


                foreach (SiteLang() as $locale => $specs) {
                    $NP[$key]['FullText' . $locale] = $Prod->contents->where('locale', $locale)->where('element_title', 'ProductIntro')->pluck('element_content')[0];
                    $NP[$key]['ShortText' . $locale] = array_values(array_filter(preg_split("/[()]/", $NP[$key]['FullText' . $locale])))[1];
                    $NP[$key]['Ptype' . $locale] = $NP_Ptype->contents()->where('locale', $locale)->pluck('element_content')[0];
                }
            }
        }


        // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
        // Ptype Section

        $PtypeImageFolder = 'storage/images/Ptypes/';
        $PtypeList = Ptype::with('contents')->get();

        if ($PtypeList) {
            $Ptypes = [];

            foreach ($PtypeList as $key => $Item) {
                $Ptypes[$key]['id'] = $Item->id;
                $Ptypes[$key]['image'] = asset($PtypeImageFolder .  $Item->id . '/' . unserialize($Item->p_image)[0]);
                $Ptypes[$key]['Text'] = $Item->contents->where('locale', app()->getLocale())->pluck('element_content')[0];
            }
        }

        //for showing all products when user selects ptype from menu
        $ProductList = Product::with('contents')->orderBy('id', 'DESC')->get();
        if ($ProductList) {
            $Products = [];

            foreach ($ProductList as $key => $Item) {
                $Products[$key]['id'] = $Item->id;
                $Products[$key]['Ptype_id'] = $Item->ptype_id;
                foreach (unserialize($Item->p_img) as $id => $image) {
                    if ($image !== 'sample.jpg') {
                        $Products[$key]['image'] = asset($this->ProductsImageFolder .  $Item->id . '/' . unserialize($Item->p_img)[$id]);
                    }
                }
                // $Products[$key]['Text'] = $Item->contents->where('locale', app()->getLocale())->pluck('element_content')[0];
                foreach (SiteLang() as $locale => $specs) {
                    $Products[$key]['FullText' . $locale] = $Item->contents->where('locale', $locale)->where('element_title', 'ProductIntro')->pluck('element_content')[0];
                    $Products[$key]['ShortText' . $locale] = array_values(array_filter(preg_split("/[()]/", $Products[$key]['FullText' . $locale])))[1];
                }
            }
        }
        //for showing 12 products from each ptype in index page
        $IndexProducts = [];
        $i = 0;
        foreach ($Ptypes as $pt) {
            foreach ($Products as $pr) {
                if ($pr['Ptype_id'] == $pt['id'] && $i < 12) {
                    $IndexProducts[$pt['id']][$i] = $pr;
                    $i++;
                }
            }
            $i = 0;
        }


        // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =



        // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
        // Contact Us Section
        $ContactUs_bg = asset('storage/images/ContactUs/cu.jpg');
        // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =

        // Catalog Section
        $Catalog_bg = asset('storage/images/Catalogs/catalog_bg.jpg');


        // Gallery Section
        $Gallery_bg = asset('storage/images/Gallery/gallery_bg.jpg');





        return view(
            'PageElements.Main.Home.index',
            compact(
                'AboutUsItem',
                'AboutUsText',
                'Ptypes',
                'Events',
                'CertificateItems',
                'ContactUs_bg',
                'Catalog_bg',
                'Gallery_bg',
                'Products',
                'NP',
                'IndexProducts',

            )
        );
    }


    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =


    public function ViewProduct(string $product_id)
    {
        // $ProductsImageFolder = 'storage/images/Products/';

        $SelectedProduct = Product::where('id', $product_id)->with('contents')->first();
        foreach (unserialize($SelectedProduct->p_img) as $id => $image) {
            if ($image !== 'sample.jpg') {
                $Product['image'] = asset($this->ProductsImageFolder .  $SelectedProduct->id . '/' . unserialize($SelectedProduct->p_img)[$id]);
            }
        }
        foreach (SiteLang() as $locale => $specs) {
            $Product['IntroText' . $locale] = $SelectedProduct->contents->where('locale', $locale)->where('element_title', 'ProductIntro')->pluck('element_content')[0];
            $Product['NutritionText' . $locale] = $SelectedProduct->contents->where('locale', $locale)->where('element_title', 'ProductNutrition')->pluck('element_content')[0];
        }

        //get 4 related product that match same ptype_id with selected product
        $RP = Product::where('ptype_id', $SelectedProduct->ptype_id)->whereNotIn('id', array($product_id))->with('contents')->orderBy('id', 'desc')->take(4)->get();
        //Related Products
        if ($RP) {
            $RelatedProducts = [];

            foreach ($RP as $key => $Item) {

                $RelatedProducts[$key]['id'] = $Item->id;
                $RelatedProducts[$key]['image'] = asset($this->ProductsImageFolder .  $Item->id . '/sample.jpg');
                $RelatedProducts[$key]['weight'] = Weight::where('id', $Item->weight_id)->pluck('weight')[0];

                $RPFlavor = Flavor::where('id', $Item->flavor_id)->with('contents')->first();
                foreach (SiteLang() as $locale => $specs) {
                    $RelatedProducts[$key]['FullText' . $locale] = $Item->contents->where('locale', $locale)->where('element_title', 'ProductIntro')->pluck('element_content')[0];
                    $RelatedProducts[$key]['ShortText' . $locale] = array_values(array_filter(preg_split("/[()]/", $RelatedProducts[$key]['FullText' . $locale])))[1];
                    $RelatedProducts[$key]['Flavor' . $locale] = $RPFlavor->contents()->where('locale', $locale)->pluck('element_content')[0];
                }
            }

            return view(
                'PageElements.Main.Shared.SubPage.SubPage',
                compact([
                    'Product',
                    'RelatedProducts'
                ])
            );
        }
    }

    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
    // View Categories Section
    public function ViewCategories($PtypeId)
    {
        $SelectedPtype = $PtypeId;
        $PtypeImageFolder = 'storage/images/Ptypes/';
        $PtypeList = Ptype::with('contents')->get();

        if ($PtypeList) {
            $Ptypes = [];

            foreach ($PtypeList as $key => $Item) {
                $Ptypes[$key]['id'] = $Item->id;
                $Ptypes[$key]['image'] = asset($PtypeImageFolder .  $Item->id . '/' . unserialize($Item->p_image)[0]);
                $Ptypes[$key]['Text'] = $Item->contents->where('locale', app()->getLocale())->pluck('element_content')[0];
            }
        }


        $ProductList = Product::with('contents')->orderBy('id', 'DESC')->get();
        if ($ProductList) {
            $Products = [];

            foreach ($ProductList as $key => $Item) {
                $Products[$key]['id'] = $Item->id;
                $Products[$key]['Ptype_id'] = $Item->ptype_id;

                foreach (unserialize($Item->p_img) as $id => $image) {
                    if ($image !== 'sample.jpg') {
                        $Products[$key]['image'] = asset($this->ProductsImageFolder .  $Item->id . '/' . unserialize($Item->p_img)[$id]);
                    }
                }


                foreach (SiteLang() as $locale => $specs) {
                    $Products[$key]['FullText' . $locale] = $Item->contents->where('locale', $locale)->where('element_title', 'ProductIntro')->pluck('element_content')[0];
                    $Products[$key]['ShortText' . $locale] = array_values(array_filter(preg_split("/[()]/", $Products[$key]['FullText' . $locale])))[1];
                }
            }
        }

        return view(
            'PageElements.Main.Shared.SubPage.SubPage',
            compact([
                'SelectedPtype',
                'Ptypes',
                'Products'
            ])
        );
    }





    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
    // Sales Offices Section
    public function SalesOffices()
    {
        $SalesOffices = LocaleContents::where([
            'page' => 'sales_office',
            'section' => 'sales_office',
            'locale' => app()->getLocale()
        ])->pluck('element_content', 'element_title');

        return view(
            'PageElements.Main.Shared.SubPage.SubPage',
            compact('SalesOffices')
        );
    }


    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
    // Gallery
    public function Gallery()
    {
        $GalleryImageFolder = 'storage/images/Gallery/';

        $Galleries = Gallery::with('contents')->orderBy('id', 'DESC')->get();
        $GItems = [];
        foreach ($Galleries as $key => $Gallery) {
            $images = unserialize($Gallery->g_img);
            foreach ($images as $img) {
                $GItems[$key]['images'][] = $GalleryImageFolder . $Gallery->id . '/' . $img;
            }


            foreach (SiteLang() as $locale => $specs) {
                $GalleryText = array_values(array_filter(preg_split("/[\r\n]/", $Gallery->contents->where('locale', $locale)->pluck('element_content')[0])));
                $GItems[$key]['Title_' . $locale] = isset($GalleryText[0]) ? $GalleryText[0] : '';
                $GItems[$key]['Description_' . $locale] = isset($GalleryText[1]) ? $GalleryText[1] : '';
            }
        }

        return view('PageElements.Main.Shared.SubPage.SubPage', compact('GItems'));
    }


    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
    // Catalog
    public function Catalog()
    {
        return view('PageElements.Main.Catalog.catalog');
    }
}
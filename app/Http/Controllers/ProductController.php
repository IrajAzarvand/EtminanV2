<?php

namespace App\Http\Controllers;

use App\Models\Ptype;
use App\Models\Flavor;
use App\Models\Weight;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\LocaleContents;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public $ProductsTmpFolder = 'storage/images/Products/tmp/';
    public $ProductsFolder = 'storage/images/Products/';
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
        $uploaded->storeAs('public\images\Products\tmp\\', $uploaded->getClientOriginalName());
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SaveText(Request $request, $Product_id = '')
    {
        if ($Product_id) {
            //edit selected product
            $Product = Product::where('id', $Product_id)->with('contents')->first();
            $Product->update([
                'ptype_id' => $request->input('ptype'),
                'weight_id' => $request->input('weight'),
                'flavor_id' => $request->input('flavor'),
            ]);
            // update product locale contents
            foreach (SiteLang() as $locale => $specs) {

                $Product->contents()->updateOrCreate(
                    [
                        'page' => 'products',
                        'section' => 'products',
                        'element_title' => 'ProductIntro',
                        'element_id' => $Product->id,
                        'locale' => $locale,
                    ],
                    [
                        'element_content' => $request->input('content_' . $locale . '_intro')
                    ]
                );
                $Product->contents()->updateOrCreate(
                    [
                        'page' => 'products',
                        'section' => 'products',
                        'element_title' => 'ProductNutrition',
                        'element_id' => $Product->id,
                        'locale' => $locale,
                    ],
                    [
                        'element_content' => $request->input('content_' . $locale . '_nutrition'),
                    ]
                );
            }

            //replace product image file if user upload new one
            $ProductFile = File::files($this->ProductsTmpFolder);
            if ($ProductFile) {
                $imgs = unserialize($Product->p_img);
                foreach ($ProductFile as $key => $item) {
                    //products have 2 images. 1=>sample.jpg for showing in index page and related products page. 2=>main image of product
                    //this if check the file name. if its sample, then move directly to product folder in storage. if its not sample, rename and move it to
                    //related product folder.
                    if ($item->getFilename() == 'sample.jpg') {
                        File::move($this->ProductsTmpFolder . $item->getFilename(), $this->ProductsFolder . $Product->id . '/' . 'sample.jpg');
                    } else {

                        foreach ($imgs as $id => $image) {
                            if ($image !== 'sample.jpg') {
                                $prevImgId = $id;
                            }
                        }
                        unlink($this->ProductsFolder . $Product->id . '/' . unserialize($Product->p_img)[$prevImgId]);
                        $newName = $Product->id . '_' . time() . '.' . $item->getExtension();
                        File::move($this->ProductsTmpFolder . $item->getFilename(), $this->ProductsFolder . $Product->id . '/' . $newName);
                        $imgs[$prevImgId] = $newName;
                        $Product->update(['p_img' => serialize($imgs)]);
                    }
                }

                return true;
            }
        } else {
            // create new product
            $ProductFile = File::files($this->ProductsTmpFolder);

            if ($ProductFile) {
                $Product = new Product;
                $Product->ptype_id = $request->input('ptype');
                $Product->weight_id = $request->input('weight');
                $Product->flavor_id = $request->input('flavor');
                $Product->save();
                $p_Img = [];
                mkdir($this->ProductsFolder . $Product->id);

                $NewProduct = Product::find($Product->id);

                foreach ($ProductFile as $key => $item) {
                    //products have 2 images. 1=>sample.jpg for showing in index page and related products page. 2=>main image of product
                    //this if check the file name. if its sample, then move directly to product folder in storage. if its not sample, rename and move it to
                    //related product folder.
                    if ($item->getFilename() == 'sample.jpg') {
                        File::move($this->ProductsTmpFolder . $item->getFilename(), $this->ProductsFolder . $NewProduct->id . '/' . 'sample.jpg');
                        $p_Img[] = 'sample.jpg';
                    } else {
                        $newName = $NewProduct->id . '_' . time() . '.' . $item->getExtension();
                        File::move($this->ProductsTmpFolder . $item->getFilename(), $this->ProductsFolder . $NewProduct->id . '/' . $newName);
                        $p_Img[] = $newName;
                    }
                }
                $NewProduct->update(['p_img' => serialize($p_Img)]);
            } else {
                return back();
            }

            // add new product texts to locale contents
            foreach (SiteLang() as $locale => $specs) {

                $NewProduct->contents()->saveMany([
                    new LocaleContents([
                        'page' => 'products',
                        'section' => 'products',
                        'element_title' => 'ProductIntro',
                        'element_id' => $NewProduct->id,
                        'locale' => $locale,
                        'element_content' => $request->input('content_' . $locale . '_intro'),
                    ]),

                    new LocaleContents([
                        'page' => 'products',
                        'section' => 'products',
                        'element_title' => 'ProductNutrition',
                        'element_id' => $NewProduct->id,
                        'locale' => $locale,
                        'element_content' => $request->input('content_' . $locale . '_nutrition'),
                    ]),
                ]);
            }
        }
        return redirect()->route('ShowNewProductPage');
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
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


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($p_id)
    {
        //  ============================================
        $FlavorItems = $this->GetFlavors();
        $WeightItems = $this->GetWeights();
        $PtypeItems = $this->GetPtypes();

        //  ============================================


        $SelectedItem = Product::where('id', $p_id)->with('contents')->first();
        $Imgs = unserialize($SelectedItem->p_img);
        $PImgs = [];
        foreach ($Imgs as $key => $img) {

            $PImgs[$key] = $this->ProductsFolder . $p_id . '/' . $img;
        }


        foreach (SiteLang() as $locale => $specs) {
            $Data['content_' . $locale . '_intro'] = $SelectedItem->contents()->where('locale', $locale)->where('element_title', 'ProductIntro')->pluck('element_content')->get(0);
            $Data['content_' . $locale . '_nutrition'] = $SelectedItem->contents()->where('locale', $locale)->where('element_title', 'ProductNutrition')->pluck('element_content')->get(0);
        }
        $Section = 'Edit';
        $Name = 'محصولات';

        $Section = 'ویرایش محصول';


        return view('PageElements.dashboard.Setting.ProductEdit', compact('SelectedItem', 'PImgs', 'Data', 'FlavorItems', 'WeightItems', 'PtypeItems', 'Section', 'Name', 'Section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $p_id)
    {
        if ($this->SaveText($request, $p_id)) {
            return redirect()->route('ShowNewProductPage');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }


    public function GoBack()
    {
        return redirect()->route('ShowNewProductPage');
    }


    /**
     * Remove the selected image from dropzone box and tmp folder.
     */
    public function DelTmp($name)
    {
        unlink($this->ProductsTmpFolder . $name);
        return true;
    }
}

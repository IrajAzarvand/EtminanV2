<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\DashboardPageLoader;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FlavorController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MainWebsitePageLoaderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PtypeController;
use App\Http\Controllers\WeightController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Main Website Routes
//=======================================================================
//index page
Route::get('/index', [MainWebsitePageLoaderController::class, 'IndexPage']);
Route::get('/', function () {
    $locale = app()->getLocale();
    $SiteLang = SiteLang();


    if ($SiteLang[app()->getLocale()]['rtl']) {
        return redirect()->to('/index?dir=rtl');
    } else {
        return redirect()->to('/index?dir=ltr');
    }
})->name('MainWebsite');


//=======================================================================
//products page
// Route::get('/Products', [MainWebsitePageLoaderController::class, 'Products'])->name('ShowProduct');
Route::get('/Product/{product_id}', [MainWebsitePageLoaderController::class, 'ViewProduct'])->name('ViewProduct');
Route::get('/Product/Categories/{PtypeId}', [MainWebsitePageLoaderController::class, 'ViewCategories'])->name('ViewCategories');


//=======================================================================
//sales offices
Route::get('/SalesOffices', [MainWebsitePageLoaderController::class, 'SalesOffices'])->name('SalesOffices');


// = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
//Change Website Language
Route::get('/locale/{langsymbol}', [MainWebsitePageLoaderController::class, 'SetLocale'])->name('SetLocale');


//=======================================================================
//Gallery
Route::get('/Gallery', [MainWebsitePageLoaderController::class, 'Gallery'])->name('Gallery');





//Dashboard Routes
//=======================================================================
Route::prefix('dashboard')->middleware('auth')->group(function () {


    //Dashboard Index
    Route::get('/', [DashboardPageLoader::class, 'dashboard'])->name('ShowDashboardPage');
    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =

    //Clear Cache
    Route::get('/cc', function () {
        Artisan::call('route:clear');
        Artisan::call('route:cache');
        echo 'route cache done.';
        // Artisan::call('config:clear');
        // Artisan::call('config:cache');
        // echo 'config cache done.';
        Artisan::call('view:clear');
        Artisan::call('view:cache');
        echo 'view cache done.';
    })->name('ClearCache');
    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =

    //migrate and seed database
    Route::get('/mrs', function () {
        Artisan::call('migrate:refresh');
        echo 'migration done.';
        Artisan::call('db:seed');
        echo 'database seed done.';
        return back();
    })->name('migrate-refresh');
    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =


    //Setting=>slider
    Route::get('/Slider', [DashboardPageLoader::class, 'Slider'])->name('ShowSliderSettingPage');
    Route::post('/Slider', [SliderController::class, 'store'])->name('StoreSliderImages');
    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =

    //Setting=>About Us
    Route::get('/AboutUs', [DashboardPageLoader::class, 'AboutUs'])->name('ShowAboutUspage');
    Route::post('/AboutUsItems', [AboutUsController::class, 'store'])->name('StoreAboutUsItems');
    Route::post('/AboutUsText', [AboutUsController::class, 'SaveText'])->name('StoreAboutUsText');
    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =


    //Setting=>Events
    Route::get('/Events', [DashboardPageLoader::class, 'Events'])->name('ShowEventspage');
    Route::post('/EventsItems', [EventController::class, 'store'])->name('StoreEventsItems');
    Route::post('/EventsText', [EventController::class, 'SaveText'])->name('StoreEventsText');
    Route::post('/UpdateEventsText', [EventController::class, 'UpdateText'])->name('EventsUpdate');
    Route::get('/Events/tmp/{name}/delete', [EventController::class, 'DelTmp'])->name('RemoveEventsTmpFile');

    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =


    //Setting=>Products=>Ptype
    Route::get('/Ptypes', [DashboardPageLoader::class, 'Ptypes'])->name('ShowPTypepage');
    Route::post('/PtypesItems', [PtypeController::class, 'store'])->name('StorePtypesItems');
    Route::post('/PtypesText', [PtypeController::class, 'SaveText'])->name('StorePtypesText');
    Route::post('/UpdatePtypesText', [PtypeController::class, 'UpdateText'])->name('PtypesUpdate');
    Route::get('/Ptypes/tmp/{name}/delete', [PtypeController::class, 'DelTmp'])->name('RemovePtypeTmpFile');

    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =


    //Setting=>Products=>WeightFlavor
    Route::get('/WeightFlavor', [DashboardPageLoader::class, 'WeightFlavor'])->name('ShowWeightFlavorPage');
    Route::post('/NewFlavor', [FlavorController::class, 'store'])->name('StoreNewFlavor');
    Route::post('/RemoveFlavor', [FlavorController::class, 'destroy'])->name('RemoveFlavor');
    Route::post('/NewWeight', [WeightController::class, 'store'])->name('StoreNewWeight');
    Route::post('/RemoveWeight', [WeightController::class, 'destroy'])->name('RemoveWeight');
    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =



    //Setting=>Products=>Product
    Route::get('/NewProduct', [DashboardPageLoader::class, 'NewProduct'])->name('ShowNewProductPage');
    Route::post('/ProductImage', [ProductController::class, 'store'])->name('StoreProductImage');
    Route::post('/ProductText', [ProductController::class, 'SaveText'])->name('StoreNewProduct');
    Route::get('/Product/{p_id}/edit', [ProductController::class, 'edit'])->name('EditProduct');
    Route::get('/BackToNewProduct', [ProductController::class, 'GoBack'])->name('BackToNewProduct');
    Route::post('/UpdateProduct/{p_id}', [ProductController::class, 'update'])->name('UpdateProduct');
    Route::get('/Product/tmp/{name}/delete', [ProductController::class, 'DelTmp'])->name('RemoveProductTmpFile');

    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =




    //Setting=>Gallery
    Route::get('/Gallery', [DashboardPageLoader::class, 'Gallery'])->name('ShowGalleryPage');
    Route::post('/GalleryItems', [GalleryController::class, 'store'])->name('StoreGalleryItems');
    Route::post('/GalleryText', [GalleryController::class, 'SaveText'])->name('StoreGalleryText');
    Route::post('/UpdateGalleryText', [GalleryController::class, 'UpdateText'])->name('GalleryUpdate');
    Route::get('/gallery/tmp/{name}/delete', [GalleryController::class, 'DelTmp'])->name('RemoveGalleryTmpFile');

    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =



    //Setting=>Add User
    Route::get('/AddUser', [DashboardPageLoader::class, 'AddUser'])->name('ShowAddUserPage');
    Route::get('/StoreNewUser', [DashboardPageLoader::class, 'StoreNewUser'])->name('StoreNewUser');

    //EMail
    // Route::prefix('dep')->group(function () {
    //     Route::get('/Mail', [DashboardPageLoader::class, 'AboutUs'])->name('ShowAboutUspage');
    // });
});
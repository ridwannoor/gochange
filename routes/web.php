<?php

use Illuminate\Support\Facades\Route;

$namespace = '\crocodicstudio\dokularavel\Controllers';
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::group(['middleware' => ['\Illuminate\Session\Middleware\StartSession'], 'prefix' => config('dokularavel.PAYMENT_PATH'), 'namespace' => $namespace], function () {
//     Route::get('/', ['uses' => 'DokuController@index', 'as' => 'DokuController.index']);
//     Route::post('check-status', ['uses' => 'DokuController@checkStatus', 'as' => 'DokuController.checkStatus']);
//     Route::post('notify/{code}', ['uses' => 'DokuController@notify', 'as' => 'DokuController.notify']);
//     Route::get('waiting-transfer', ['uses' => 'DokuController@waitingTransfer', 'as' => 'DokuController.waitingTransfer']);
//     Route::get('paycode', ['uses' => 'DokuController@paycode', 'as' => 'DokuController.paycode']);
//     Route::get('finish', ['uses' => 'DokuController@finish', 'as' => 'DokuController.finish']);
//     Route::post('pay', ['uses' => 'DokuController@pay', 'as' => 'DokuController.pay']);
//     Route::get('debug', ['uses' => 'DokuController@debug', 'as' => 'DokuController.debug']);
//     Route::post('status/{invoice_no}', ['uses' => 'DokuController@checkPaymentStatus', 'as' => 'DokuController.checkPaymentStatus']);
// });


Route::get('/admin/ipaddress', 'Admin\Router\IpaddressController@index')->name('ipaddress');
Route::get('/admin/setting', 'Admin\Router\SettingController@index')->name('setting');
Route::get('/admin/addrouter', 'Admin\Router\SettingController@addrouter')->name('addrouter');
Route::post('/admin/router/store', 'Admin\Router\SettingController@store')->name('addrouter.store');
//FRONT 
Route::get('/', 'HomeController@index')->name('home');
Route::get('/cara-order', 'HomeController@caraorder')->name('cara-order');
Route::get('/syarat-ketentuan', 'HomeController@syaratketentuan')->name('syarat-ketentuan');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/blog', 'HomeController@post')->name('post');

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/saldo', 'User\SaldoController@saldo')->name('saldo');
Route::get('/vcc', 'User\SaldoController@vcc')->name('vcc');
Route::get('/riwayat', 'User\SaldoController@riwayat')->name('riwayat');
Route::get('/payment', 'User\SaldoController@checkout')->name('payment');

// Route::get('/login', )
// Route::get('/login', 'Auth\LoginController')->name('login');
Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin');


Route::get('/partner', 'HomeController@partner')->name('partner');
Route::get('/comingsoon', 'HomeController@comingsoon')->name('comingsoon');
Route::get('/contact', 'HomeController@about')->name('about');
Route::post('/contact/save', 'HomeController@contactsave')->name('contactsave');
Route::get('/portfolio', 'HomeController@portfolio')->name('portfolio');
Route::get('/portfolio/detail/{id}', 'HomeController@portfoliodetail')->name('portfoliodetail');

Route::get('/blog/detail/{id}', 'HomeController@postdetail')->name('postdetail');
// Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/admin/home', 'Admin\HomeController@index')->name('home');

//Bank
Route::post('/admin/bank/store', 'Admin\BankController@store')->name('bank.store');
Route::put('/admin/bank/update', 'Admin\BankController@update')->name('bank.update');
Route::get('/admin/bank/destroy/{id}', 'Admin\BankController@destroy')->name('bank.destroy');
//General
Route::get('/admin/general', 'Admin\GeneralController@index')->name('general');
Route::get('/admin/general/edit/{id}', 'Admin\GeneralController@edit')->name('generaledit');
Route::put('/admin/general/update', 'Admin\GeneralController@update')->name('generalupdate');
Route::put('/admin/general/permission', 'Admin\GeneralController@permission')->name('general.permission');
// /admin/general/permission
//Slider
Route::get('/admin/slider', 'Admin\SliderController@index')->name('slider');
Route::get('/admin/slider/create', 'Admin\SliderController@create')->name('slidercreate');
Route::post('/admin/slider/store', 'Admin\SliderController@store')->name('sliderstore');
Route::get('/admin/slider/edit/{id}', 'Admin\SliderController@edit')->name('slideredit');
Route::get('/admin/slider/show/{id}', 'Admin\SliderController@show')->name('slidershow');
Route::put('/admin/slider/update', 'Admin\SliderController@update')->name('sliderupdate');
Route::get('/admin/slider/destroy/{id}', 'Admin\SliderController@destroy')->name('sliderdestroy');

//Invoice
Route::get('/admin/invoice', 'Admin\InvoiceController@index')->name('invoice');
Route::get('/admin/invoice/create', 'Admin\InvoiceController@create')->name('invoice.create');
Route::post('/admin/invoice/store', 'Admin\InvoiceController@store')->name('invoice.store');
Route::get('/admin/invoice/detail/{id}', 'Admin\InvoiceController@detail')->name('invoice.detail');
Route::put('/admin/invoice/storedetail', 'Admin\InvoiceController@storedetail')->name('invoice.storedetail');
Route::get('/admin/invoice/edit/{id}', 'Admin\InvoiceController@edit')->name('invoice.edit');
Route::get('/admin/invoice/editdetail/{id}', 'Admin\InvoiceController@editdetail')->name('invoice.editdetail');
Route::put('/admin/invoice/updatedetail', 'Admin\InvoiceController@updatedetail')->name('invoice.updatedetail');
Route::get('/admin/invoice/show/{id}', 'Admin\InvoiceController@show')->name('invoice.show');
Route::put('/admin/invoice/update', 'Admin\InvoiceController@update')->name('invoice.update');
Route::get('/admin/invoice/destroy/{id}', 'Admin\InvoiceController@destroy')->name('invoice.destroy');
Route::get('/admin/invoice/cetak/{id}', 'Admin\InvoiceController@cetak')->name('invoice.cetak');
Route::get('/admin/invoice/publish/{id}', 'Admin\InvoiceController@publish')->name('invoice.publish');

//Partner
Route::get('/admin/partner', 'Admin\PartnerController@index')->name('partner');
Route::get('/admin/partner/create', 'Admin\PartnerController@create')->name('partnercreate');
Route::post('/admin/partner/store', 'Admin\PartnerController@store')->name('partnerstore');
Route::get('/admin/partner/edit/{id}', 'Admin\PartnerController@edit')->name('partneredit');
Route::get('/admin/partner/show/{id}', 'Admin\PartnerController@show')->name('partnershow');
Route::put('/admin/partner/update', 'Admin\PartnerController@update')->name('partnerupdate');
Route::get('/admin/partner/destroy/{id}', 'Admin\PartnerController@destroy')->name('partnerdestroy');


//Price
Route::get('/admin/pricing', 'Admin\PricingController@index')->name('pricing');
Route::get('/admin/pricing/create', 'Admin\PricingController@create')->name('pricing.create');
Route::post('/admin/pricing/store', 'Admin\PricingController@store')->name('pricing.store');
Route::get('/admin/pricing/edit/{id}', 'Admin\PricingController@edit')->name('pricing.edit');
Route::get('/admin/pricing/show/{id}', 'Admin\PricingController@show')->name('pricing.show');
Route::put('/admin/pricing/update', 'Admin\PricingController@update')->name('pricing.update');
Route::get('/admin/pricing/destroy/{id}', 'Admin\PricingController@destroy')->name('pricing.destroy');

//Badan Usaha
Route::get('/admin/badan', 'Admin\BadanController@index')->name('badan');
Route::get('/admin/badan/create', 'Admin\BadanController@create')->name('badan.create');
Route::post('/admin/badan/store', 'Admin\BadanController@store')->name('badan.store');
Route::get('/admin/badan/edit/{id}', 'Admin\BadanController@edit')->name('badan.edit');
Route::put('/admin/badan/update', 'Admin\BadanController@update')->name('badan.update');
Route::get('/admin/badan/destroy/{id}', 'Admin\BadanController@destroy')->name('badan.destroy');

//Banner
Route::get('/admin/banner', 'Admin\BannerController@index')->name('banner');
Route::get('/admin/banner/create', 'Admin\BannerController@create')->name('bannercreate');
Route::post('/admin/banner/store', 'Admin\BannerController@store')->name('bannerstore');
Route::get('/admin/banner/edit/{id}', 'Admin\BannerController@edit')->name('banneredit');
Route::get('/admin/banner/show/{id}', 'Admin\BannerController@show')->name('bannershow');
Route::put('/admin/banner/update', 'Admin\BannerController@update')->name('bannerupdate');
Route::get('/admin/banner/destroy/{id}', 'Admin\BannerController@destroy')->name('bannerdestroy');

//Sponsor
Route::get('/admin/sponsor', 'Admin\SponsorController@index')->name('sponsor');
Route::get('/admin/sponsor/create', 'Admin\SponsorController@create')->name('sponsorcreate');
Route::post('/admin/sponsor/store', 'Admin\SponsorController@store')->name('sponsorstore');
Route::get('/admin/sponsor/edit/{id}', 'Admin\SponsorController@edit')->name('sponsoredit');
Route::get('/admin/sponsor/show/{id}', 'Admin\SponsorController@show')->name('sponsorshow');
Route::put('/admin/sponsor/update', 'Admin\SponsorController@update')->name('sponsorupdate');
Route::get('/admin/sponsor/destroy/{id}', 'Admin\SponsorController@destroy')->name('sponsordestroy');

//Portfolio
Route::get('/admin/portfolio', 'Admin\PortfolioController@index')->name('portfolio');
Route::get('/admin/portfolio/create', 'Admin\PortfolioController@create')->name('portfoliocreate');
Route::post('/admin/portfolio/store', 'Admin\PortfolioController@store')->name('portfoliostore');
Route::get('/admin/portfolio/edit/{id}', 'Admin\PortfolioController@edit')->name('portfolioedit');
Route::get('/admin/portfolio/show/{id}', 'Admin\PortfolioController@show')->name('portfolioshow');
Route::put('/admin/portfolio/update', 'Admin\PortfolioController@update')->name('portfolioupdate');
Route::get('/admin/portfolio/destroy/{id}', 'Admin\PortfolioController@destroy')->name('portfoliodestroy');
Route::get('/admin/portfolio/publish/{id}', 'Admin\PortfolioController@publish')->name('portfoliopublish');

//Category Portfolio
Route::get('/admin/categoryportfolio', 'Admin\CategoryportfolioController@index')->name('categoryportfolio');
Route::get('/admin/categoryportfolio/create', 'Admin\CategoryportfolioController@create')->name('categoryportfoliocreate');
Route::post('/admin/categoryportfolio/store', 'Admin\CategoryportfolioController@store')->name('categoryportfoliostore');
Route::get('/admin/categoryportfolio/edit/{id}', 'Admin\CategoryportfolioController@edit')->name('categoryportfolioedit');
// Route::get('/admin/categoryportfolio/show/{id}', 'Admin\CategoryportfolioController@show')->name('categoryportfolioshow');
Route::put('/admin/categoryportfolio/update', 'Admin\CategoryportfolioController@update')->name('categoryportfolioupdate');
Route::get('/admin/categoryportfolio/destroy/{id}', 'Admin\CategoryportfolioController@destroy')->name('categoryportfoliodestroy');

//Blog
Route::get('/admin/post', 'Admin\PostController@index')->name('post');
Route::get('/admin/post/create', 'Admin\PostController@create')->name('postcreate');
Route::post('/admin/post/store', 'Admin\PostController@store')->name('poststore');
Route::get('/admin/post/edit/{id}', 'Admin\PostController@edit')->name('postedit');
Route::get('/admin/post/show/{id}', 'Admin\PostController@show')->name('postshow');
Route::put('/admin/post/update', 'Admin\PostController@update')->name('postupdate');
Route::get('/admin/post/destroy/{id}', 'Admin\PostController@destroy')->name('postdestroy');
Route::get('/admin/post/publish/{id}', 'Admin\PostController@publish')->name('postpublish');
Route::post('/admin/post/fileUpload', 'Admin\PostController@fileUpload')->name('post.fileUpload');
Route::put('/admin/post/updatefileUpload', 'Admin\PostController@updatefileUpload')->name('postupdatefileUpload');

//comment 
Route::post('/comment/store', 'HomeController@comment')->name('post.comment');

//Category Blog
Route::get('/admin/categorypost', 'Admin\CategorypostController@index')->name('categorypost');
Route::get('/admin/categorypost/create', 'Admin\CategorypostController@create')->name('categorypostcreate');
Route::post('/admin/categorypost/store', 'Admin\CategorypostController@store')->name('categorypoststore');
Route::get('/admin/categorypost/edit/{id}', 'Admin\CategorypostController@edit')->name('categorypostedit');
// Route::get('/admin/categorypost/show/{id}', 'Admin\CategorypostController@show')->name('categorypostshow');
Route::put('/admin/categorypost/update', 'Admin\CategorypostController@update')->name('categorypostupdate');
Route::get('/admin/categorypost/destroy/{id}', 'Admin\CategorypostController@destroy')->name('categorypostdestroy');

//Tag Blog
Route::get('/admin/tagpost', 'Admin\TagpostController@index')->name('tagpost');
Route::get('/admin/tagpost/create', 'Admin\TagpostController@create')->name('tagpostcreate');
Route::post('/admin/tagpost/store', 'Admin\TagpostController@store')->name('tagpoststore');
Route::get('/admin/tagpost/edit/{id}', 'Admin\TagpostController@edit')->name('tagpostedit');
// Route::get('/admin/tagpost/show/{id}', 'Admin\TagpostController@show')->name('tagpostshow');
Route::put('/admin/tagpost/update', 'Admin\TagpostController@update')->name('tagpostupdate');
Route::get('/admin/tagpost/destroy/{id}', 'Admin\TagpostController@destroy')->name('tagpostdestroy');

//Team
Route::get('/admin/team', 'Admin\TeamController@index')->name('team');
Route::get('/admin/team/create', 'Admin\TeamController@create')->name('teamcreate');
Route::post('/admin/team/store', 'Admin\TeamController@store')->name('teamstore');
Route::get('/admin/team/edit/{id}', 'Admin\TeamController@edit')->name('teamedit');
Route::get('/admin/team/show/{id}', 'Admin\TeamController@show')->name('teamshow');
Route::put('/admin/team/update', 'Admin\TeamController@update')->name('teamupdate');
Route::get('/admin/team/destroy/{id}', 'Admin\TeamController@destroy')->name('teamdestroy');
Route::get('/admin/team/publish/{id}', 'Admin\TeamController@publish')->name('team.publish');
//Category Gallery
//Category Team
Route::get('/admin/categoryteam', 'Admin\CategoryteamController@index')->name('categoryteam');
Route::get('/admin/categoryteam/create', 'Admin\CategoryteamController@create')->name('categoryteamcreate');
Route::post('/admin/categoryteam/store', 'Admin\CategoryteamController@store')->name('categoryteamstore');
Route::get('/admin/categoryteam/edit/{id}', 'Admin\CategoryteamController@edit')->name('categoryteamedit');
// Route::get('/admin/categoryteam/show/{id}', 'Admin\CategoryteamController@show')->name('categoryteamshow');
Route::put('/admin/categoryteam/update', 'Admin\CategoryteamController@update')->name('categoryteamupdate');
Route::get('/admin/categoryteam/destroy/{id}', 'Admin\CategoryteamController@destroy')->name('categoryteamdestroy');

//Product
Route::get('/admin/product', 'Admin\ProductController@index')->name('product');
Route::get('/admin/product/create', 'Admin\ProductController@create')->name('productcreate');
Route::post('/admin/product/store', 'Admin\ProductController@store')->name('productstore');
Route::get('/admin/product/edit/{id}', 'Admin\ProductController@edit')->name('productedit');
Route::get('/admin/product/show/{id}', 'Admin\ProductController@show')->name('productshow');
Route::put('/admin/product/update', 'Admin\ProductController@update')->name('productupdate');
Route::get('/admin/product/destroy/{id}', 'Admin\ProductController@destroy')->name('productdestroy');
Route::get('/admin/product/destroyfile/{id}', 'Admin\ProductController@destroyfile')->name('productdestroyfile');
Route::get('/admin/product/publish/{id}', 'Admin\ProductController@publish')->name('productpublish');
Route::get('/admin/product/subcat', 'Admin\ProductController@data')->name('subcat');
//Category Product
Route::get('/admin/categoryproduct', 'Admin\CategoryproductController@index')->name('categoryproduct');
Route::get('/admin/categoryproduct/create', 'Admin\CategoryproductController@create')->name('categoryproductcreate');
Route::post('/admin/categoryproduct/store', 'Admin\CategoryproductController@store')->name('categoryproductstore');
Route::get('/admin/categoryproduct/edit/{id}', 'Admin\CategoryproductController@edit')->name('categoryproductedit');
// Route::get('/admin/categoryproduct/show/{id}', 'Admin\CategoryproductController@show')->name('categoryproductshow');
Route::put('/admin/categoryproduct/update', 'Admin\CategoryproductController@update')->name('categoryproductupdate');
Route::get('/admin/categoryproduct/destroy/{id}', 'Admin\CategoryproductController@destroy')->name('categoryproductdestroy');


//Sub Category Product
Route::get('/admin/subcategory', 'Admin\SubcategoryController@index')->name('subcategory');
Route::get('/admin/subcategory/create', 'Admin\SubcategoryController@create')->name('Subcategory.create');
Route::post('/admin/subcategory/store', 'Admin\SubcategoryController@store')->name('Subcategory.store');
Route::get('/admin/subcategory/edit/{id}', 'Admin\SubcategoryController@edit')->name('Subcategory.edit');
Route::put('/admin/subcategory/update', 'Admin\SubcategoryController@update')->name('Subcategory.update');
Route::get('/admin/subcategory/destroy/{id}', 'Admin\SubcategoryController@destroy')->name('Subcategory.destroy');

//Service
Route::get('/admin/service', 'Admin\ServiceController@index')->name('service');
Route::get('/admin/service/create', 'Admin\ServiceController@create')->name('servicecreate');
Route::post('/admin/service/store', 'Admin\ServiceController@store')->name('servicestore');
Route::get('/admin/service/edit/{id}', 'Admin\ServiceController@edit')->name('serviceedit');
Route::get('/admin/service/show/{id}', 'Admin\ServiceController@show')->name('serviceshow');
Route::put('/admin/service/update', 'Admin\ServiceController@update')->name('serviceupdate');
Route::get('/admin/service/destroy/{id}', 'Admin\ServiceController@destroy')->name('servicedestroy');

//Category Service
Route::get('/admin/categoryservice', 'Admin\CategoryserviceController@index')->name('categoryservice');
Route::get('/admin/categoryservice/create', 'Admin\CategoryserviceController@create')->name('categoryservicecreate');
Route::post('/admin/categoryservice/store', 'Admin\CategoryserviceController@store')->name('categoryservicestore');
Route::get('/admin/categoryservice/edit/{id}', 'Admin\CategoryserviceController@edit')->name('categoryserviceedit');
// Route::get('/admin/categoryservice/show/{id}', 'Admin\CategoryserviceController@show')->name('categoryserviceshow');
Route::put('/admin/categoryservice/update', 'Admin\CategoryserviceController@update')->name('categoryserviceupdate');
Route::get('/admin/categoryservice/destroy/{id}', 'Admin\CategoryserviceController@destroy')->name('categoryservicedestroy');


//Gallery
Route::get('/admin/gallery', 'Admin\GalleryController@index')->name('gallery');
Route::get('/admin/gallery/create', 'Admin\GalleryController@create')->name('gallerycreate');
Route::post('/admin/gallery/store', 'Admin\GalleryController@store')->name('gallerystore');
Route::get('/admin/gallery/edit/{id}', 'Admin\GalleryController@edit')->name('galleryedit');
Route::get('/admin/gallery/show/{id}', 'Admin\GalleryController@show')->name('galleryshow');
Route::put('/admin/gallery/update', 'Admin\GalleryController@update')->name('galleryupdate');
Route::get('/admin/gallery/destroy/{id}', 'Admin\GalleryController@destroy')->name('gallerydestroy');
Route::get('/admin/gallery/publish/{id}', 'Admin\GalleryController@publish')->name('gallery.publish');
//Category Gallery
Route::get('/admin/categorygallery', 'Admin\CategorygalleryController@index')->name('categorygallery');
Route::get('/admin/categorygallery/create', 'Admin\CategorygalleryController@create')->name('categorygallerycreate');
Route::post('/admin/categorygallery/store', 'Admin\CategorygalleryController@store')->name('categorygallerystore');
Route::get('/admin/categorygallery/edit/{id}', 'Admin\CategorygalleryController@edit')->name('categorygalleryedit');
// Route::get('/admin/categorygallery/show/{id}', 'Admin\CategorygalleryController@show')->name('categorygalleryshow');
Route::put('/admin/categorygallery/update', 'Admin\CategorygalleryController@update')->name('categorygalleryupdate');
Route::get('/admin/categorygallery/destroy/{id}', 'Admin\CategorygalleryController@destroy')->name('categorygallerydestroy');

//Video
Route::get('/admin/video', 'Admin\VideoController@index')->name('video');
Route::get('/admin/video/create', 'Admin\VideoController@create')->name('videocreate');
Route::post('/admin/video/store', 'Admin\VideoController@store')->name('videostore');
Route::get('/admin/video/edit/{id}', 'Admin\VideoController@edit')->name('videoedit');
Route::get('/admin/video/show/{id}', 'Admin\VideoController@show')->name('videoshow');
Route::put('/admin/video/update', 'Admin\VideoController@update')->name('videoupdate');
Route::get('/admin/video/destroy/{id}', 'Admin\VideoController@destroy')->name('videodestroy');

//Category Video
Route::get('/admin/categoryvideo', 'Admin\CategoryvideoController@index')->name('categoryvideo');
Route::get('/admin/categoryvideo/create', 'Admin\CategoryvideoController@create')->name('categoryvideocreate');
Route::post('/admin/categoryvideo/store', 'Admin\CategoryvideoController@store')->name('categoryvideostore');
Route::get('/admin/categoryvideo/edit/{id}', 'Admin\CategoryvideoController@edit')->name('categoryvideoedit');
// Route::get('/admin/categoryvideo/show/{id}', 'Admin\CategoryvideoController@show')->name('categoryvideoshow');
Route::put('/admin/categoryvideo/update', 'Admin\CategoryvideoController@update')->name('categoryvideoupdate');
Route::get('/admin/categoryvideo/destroy/{id}', 'Admin\CategoryvideoController@destroy')->name('categoryvideodestroy');


//Testimoni
Route::get('/admin/testimoni', 'Admin\TestimoniController@index')->name('testimoni');
Route::get('/admin/testimoni/create', 'Admin\TestimoniController@create')->name('testimonicreate');
Route::post('/admin/testimoni/store', 'Admin\TestimoniController@store')->name('testimonistore');
Route::get('/admin/testimoni/edit/{id}', 'Admin\TestimoniController@edit')->name('testimoniedit');
Route::get('/admin/testimoni/show/{id}', 'Admin\TestimoniController@show')->name('testimonishow');
Route::put('/admin/testimoni/update', 'Admin\TestimoniController@update')->name('testimoniupdate');
Route::get('/admin/testimoni/destroy/{id}', 'Admin\TestimoniController@destroy')->name('testimonidestroy');
Route::get('/admin/testimoni/publish/{id}', 'Admin\TestimoniController@publish')->name('testimonipublish');


Route::get('/admin/contactus', 'Admin\ContactusController@index')->name('contactus.admin');

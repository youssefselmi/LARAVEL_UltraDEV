<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;
use App\Http\Controllers\CentreController;
use App\Http\Controllers\TypeCentreController;
use App\Http\Controllers\Frontofficecontroller;


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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

Route::controller(AuthController::class)->middleware('loggedin')->group(function() {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'login')->name('login.check');
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::controller(PageController::class)->group(function() {
        Route::get('/', 'dashboardOverview1')->name('dashboard-overview-1');
        Route::get('dashboard-overview-2-page', 'dashboardOverview2')->name('dashboard-overview-2');
        Route::get('dashboard-overview-3-page', 'dashboardOverview3')->name('dashboard-overview-3');
        Route::get('dashboard-overview-4-page', 'dashboardOverview4')->name('dashboard-overview-4');
        Route::get('categories-page', 'categories')->name('categories');
        Route::get('add-product-page', 'addProduct')->name('add-product');
        Route::get('product-list-page', 'productList')->name('product-list');
        Route::get('product-grid-page', 'productGrid')->name('product-grid');
        Route::get('transaction-list-page', 'transactionList')->name('transaction-list');
        Route::get('transaction-detail-page', 'transactionDetail')->name('transaction-detail');
        Route::get('seller-list-page', 'sellerList')->name('seller-list');
        Route::get('seller-detail-page', 'sellerDetail')->name('seller-detail');
        Route::get('reviews-page', 'reviews')->name('reviews');
        Route::get('inbox-page', 'inbox')->name('inbox');
        Route::get('file-manager-page', 'fileManager')->name('file-manager');
        Route::get('point-of-sale-page', 'pointOfSale')->name('point-of-sale');
        Route::get('chat-page', 'chat')->name('chat');
        Route::get('post-page', 'post')->name('post');
        Route::get('calendar-page', 'calendar')->name('calendar');
        Route::get('crud-data-list-page', 'crudDataList')->name('crud-data-list');
        Route::get('crud-form-page', 'crudForm')->name('crud-form');
        Route::get('users-layout-1-page', 'usersLayout1')->name('users-layout-1');
        Route::get('users-layout-2-page', 'usersLayout2')->name('users-layout-2');
        Route::get('users-layout-3-page', 'usersLayout3')->name('users-layout-3');
        Route::get('profile-overview-1-page', 'profileOverview1')->name('profile-overview-1');
        Route::get('profile-overview-2-page', 'profileOverview2')->name('profile-overview-2');
        Route::get('profile-overview-3-page', 'profileOverview3')->name('profile-overview-3');
        Route::get('wizard-layout-1-page', 'wizardLayout1')->name('wizard-layout-1');
        Route::get('wizard-layout-2-page', 'wizardLayout2')->name('wizard-layout-2');
        Route::get('wizard-layout-3-page', 'wizardLayout3')->name('wizard-layout-3');
        Route::get('blog-layout-1-page', 'blogLayout1')->name('blog-layout-1');
        Route::get('blog-layout-2-page', 'blogLayout2')->name('blog-layout-2');
        Route::get('blog-layout-3-page', 'blogLayout3')->name('blog-layout-3');
        Route::get('pricing-layout-1-page', 'pricingLayout1')->name('pricing-layout-1');
        Route::get('pricing-layout-2-page', 'pricingLayout2')->name('pricing-layout-2');
        Route::get('invoice-layout-1-page', 'invoiceLayout1')->name('invoice-layout-1');
        Route::get('invoice-layout-2-page', 'invoiceLayout2')->name('invoice-layout-2');
        Route::get('faq-layout-1-page', 'faqLayout1')->name('faq-layout-1');
        Route::get('faq-layout-2-page', 'faqLayout2')->name('faq-layout-2');
        Route::get('faq-layout-3-page', 'faqLayout3')->name('faq-layout-3');
        Route::get('login-page', 'login')->name('login');
        Route::get('register-page', 'register')->name('register');
        Route::get('error-page-page', 'errorPage')->name('error-page');
        Route::get('update-profile-page', 'updateProfile')->name('update-profile');
        Route::get('change-password-page', 'changePassword')->name('change-password');
        Route::get('regular-table-page', 'regularTable')->name('regular-table');
        Route::get('tabulator-page', 'tabulator')->name('tabulator');
        Route::get('modal-page', 'modal')->name('modal');
        Route::get('slide-over-page', 'slideOver')->name('slide-over');
        Route::get('notification-page', 'notification')->name('notification');
        Route::get('tab-page', 'tab')->name('tab');
        Route::get('accordion-page', 'accordion')->name('accordion');
        Route::get('button-page', 'button')->name('button');
        Route::get('alert-page', 'alert')->name('alert');
        Route::get('progress-bar-page', 'progressBar')->name('progress-bar');
        Route::get('tooltip-page', 'tooltip')->name('tooltip');
        Route::get('dropdown-page', 'dropdown')->name('dropdown');
        Route::get('typography-page', 'typography')->name('typography');
        Route::get('icon-page', 'icon')->name('icon');
        Route::get('loading-icon-page', 'loadingIcon')->name('loading-icon');
        Route::get('regular-form-page', 'regularForm')->name('regular-form');
        Route::get('datepicker-page', 'datepicker')->name('datepicker');
        Route::get('tom-select-page', 'tomSelect')->name('tom-select');
        Route::get('file-upload-page', 'fileUpload')->name('file-upload');
        Route::get('wysiwyg-editor-classic', 'wysiwygEditorClassic')->name('wysiwyg-editor-classic');
        Route::get('wysiwyg-editor-inline', 'wysiwygEditorInline')->name('wysiwyg-editor-inline');
        Route::get('wysiwyg-editor-balloon', 'wysiwygEditorBalloon')->name('wysiwyg-editor-balloon');
        Route::get('wysiwyg-editor-balloon-block', 'wysiwygEditorBalloonBlock')->name('wysiwyg-editor-balloon-block');
        Route::get('wysiwyg-editor-document', 'wysiwygEditorDocument')->name('wysiwyg-editor-document');
        Route::get('validation-page', 'validation')->name('validation');
        Route::get('chart-page', 'chart')->name('chart');
        Route::get('slider-page', 'slider')->name('slider');
        Route::get('image-zoom-page', 'imageZoom')->name('image-zoom');



 /////////////////// Type centre ////////////////////////////       

Route::get('/typecentre', function () {
    
    return view('typescentres.typescentre');


});
Route::get('/typecentre', [App\Http\Controllers\TypeCentreController::class, 'index'])->name("typecentre");


Route::delete('/deletetype/{typecentre}', [App\Http\Controllers\TypeCentreController::class, 'destroy']);
Route::post('/addtype', [App\Http\Controllers\TypeCentreController::class, 'add']);
Route::get('/addtype', function () {
    return view('typescentres.addtype');
});

     

Route::get('/typecentre/{typecentre}/modifiertype', [App\Http\Controllers\TypeCentreController::class, 'getUpdate']);
Route::put('/typecentre/{typecentre}',[App\Http\Controllers\TypeCentreController::class, 'update']);

///////////////////////////////////////////////////////////////////











///////////////////////////////// centres //////////////////////////////


Route::get('/Centre', function () {
    
  //  $les = DB::table('type_centres')->get();
   //  return dd($les);
   return view('centres.centre',compact('les'));
});
Route::get('/Centre', [App\Http\Controllers\CentreController::class, 'index'])->name("centres");
 


Route::post('/addcentre', [App\Http\Controllers\CentreController::class, 'add']);
Route::get('/addcentre', function () {
      $donnes = DB::table('type_centres')->get();
  //  return dd($donnes);
    return view('centres.addcentre',compact('donnes'));
});



Route::delete('/deletecentre/{centre}', [App\Http\Controllers\CentreController::class, 'destroy']);
Route::get('/centre/{centre}/modifier', [App\Http\Controllers\CentreController::class, 'getUpdate']);
Route::put('/centre/{centre}',[App\Http\Controllers\CentreController::class, 'update']);
Route::get('/centredetail/{id}', function () {
    return view('centres.centre');
});
Route::get('/centredetail/{id}', [App\Http\Controllers\CentreController::class, 'show']);

Route::get('/centredetailfront/{id}', [App\Http\Controllers\Frontofficecontroller::class, 'showfront']);

    });
});










///////////////////////////////////////////////////////////////////////////////////////////

Route::get('/centregrid', function () {
    return view('centres.centregrid');
});
Route::get('/centregrid', [App\Http\Controllers\CentreController::class, 'index2'])->name("centregrid");



/////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/frontoffice', function () {  
    return view('frontoffice.indexfront');

});
Route::get('/frontoffice', [App\Http\Controllers\Frontofficecontroller::class, 'indexfront'])->name("front");







///////////////////////////////////////////// route jalel //////////////////////////////////

/////////////////// Session ////////////////////////////       

Route::get('/session', function () {
    
    return view('sessions.session');


});
Route::get('/session', [App\Http\Controllers\SessionController::class, 'index'])->name("session");
Route::delete('/deletesession/{session}', [App\Http\Controllers\SessionController::class, 'destroy']);
Route::post('/addsession', [App\Http\Controllers\SessionController::class, 'add']);
Route::get('/addsession', function () {
    $donnesformation = DB::table('formations')->get();
    return view('sessions.addsession',compact('donnesformation'));
});

     

Route::get('/session/{session}/modifiersession', [App\Http\Controllers\SessionController::class, 'getUpdate']);
Route::put('/session/{session}',[App\Http\Controllers\SessionController::class, 'update']);
        /////////////// formations /////////////////////
    
Route::get('/formation', function () {
    
    //  $les = DB::table('type_centres')->get();
     //  return dd($les);
     return view('formations.formation'/* ,compact('les') */);
  });
  Route::get('/formation', [App\Http\Controllers\FormationController::class, 'index'])->name("formations");
   
  
  
  Route::post('/addformation', [App\Http\Controllers\FormationController::class, 'add']);
  Route::get('/addformation', function () {
        $donnes = DB::table('sessions')->get();
    //  return dd($donnes);
      return view('formations.addformation',compact('donnes'));
  });
  
  
  
  Route::delete('/deleteformation/{formation}', [App\Http\Controllers\FormationController::class, 'destroy']);
  Route::get('/formation/{formation}/modifier', [App\Http\Controllers\FormationController::class, 'getUpdate']);
  Route::put('/formation/{formation}',[App\Http\Controllers\FormationController::class, 'update']);
  Route::get('/formationdetail/{id}', function () {
      return view('formations.formation');
  });
  Route::get('/formationdetail/{id}', [App\Http\Controllers\FormationController::class, 'show']);














  ///////////////////////////////// Reclamations elyes ////////////////////////////////////////////////



  Route::post('/addreclamation', [App\Http\Controllers\ReclamationController::class, 'add']);
  Route::get('/addreclamation', function () {
      return view('reclamation.addreclamation');
  });
  


  Route::get('/reclamation', function () {   
    return view('reclamation.reclamation');
});
Route::get('/reclamation', [App\Http\Controllers\ReclamationController::class, 'index'])->name("reclamation");
Route::delete('/deletereclamation/{reclamation}', [App\Http\Controllers\ReclamationController::class, 'destroy']);


Route::get('/repondre', function () {   
    return view('reclamation.reponse');
});
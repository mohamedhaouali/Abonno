<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Routes;
use App\User;
use Spatie\Activitylog\Models\Activity;

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

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/', function () {
    return view('login');
});

Route::get('/home4', function () {
    return Activity::all()->last();

});


Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("home",  'HomeController@index' ,function(){
        return view ("home")->name('home');
    }  );

});

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home1', 'HomeController@index1')->name('home1');

Route::get('/home2', 'HomeController@index2')->name('home2');

Auth::routes();



/*********************companies****************/

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("indexcompanieimport",  'CompanieController@indexcompanieimport' ,function(){
        return view ("indexcompanieimport")->name('indexcompanieimport');
    }  );




});

Route::resource('companies', 'CompanieController')->middleware('can:manage-users');


Route::get('/import-formcompanie', 'CompanieController@importFormcompanie');

Route::get('/indexcompanieimport','CompanieController@indexcompanieimport')->middleware('can:manage-users')->name('indexcompanieimport');

Route::post('/importcompanie', 'CompanieController@importcompanie')->name('importcompanie');






/**************/



Route::resource('holograms', 'HologramController');



Route::resource('levels', 'LevelController');


Route::resource('etats', 'EtatController');

Route::resource('clientstypes', 'ClientstypeController');




Route::resource('subscriptionstypes', 'SubscriptionstypeController');




/***************************route customer*******/
Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("indexclient",  'ClientController@indexclient' ,function(){
        return view ("indexclient")->name('indexclient');
    }  );

});

Route::get('/indexclient','ClientController@indexclient')->middleware('can:manage-users')->name('indexclient');


Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get('/addclient',  'ClientController@addclient' ,function(){
        return view ("addclient")->name('addclient');
    }  );

});


Route::get('/addclient','ClientController@addclient')->middleware('can:manage-users')->name('addclient');


Route::post('/storeclient','ClientController@storeclient')->middleware('can:manage-users')->name('storeclient');

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("/client/editclient/{id}",  'ClientController@editclient' ,function(){
        return view ("editclient")->name('');
    }  );
    Route::get("/indexclientimport",  'ClientController@indexclientimport' ,function(){
        return view ("indexclientimport")->name('indexclientimport');
    }  );

    Route::get('/indexclientimport','ClientController@indexclientimport')->middleware('can:manage-users')->name('indexclientimport');

});


Route::get('/client/editclient/{id}','ClientController@editclient')->middleware('can:manage-users')->name('editclient');



Route::post('/client/updateclient/{id}','ClientController@updateclient')->middleware('can:manage-users')->name('updateclient');
Route::get('/client/deleteclient/{id}','ClientController@deleteclient')->middleware('can:manage-users')->name('deleteclient');
Route::post('/clientsearch', 'ClientController@clientsearch')->middleware('can:manage-users')->name('clientsearch');

Route::get('/import-formclient', 'ClientController@importFormClient');

Route::post('/importclient', 'ClientController@importclient')->name('importclient');

Route::get('/indexclientimport','ClientController@indexclientimport')->middleware('can:manage-users')->name('indexclientimport');

/***************************route car*******/

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("indexcar",  'CarController@indexcar' ,function(){
        return view ("indexcar")->name('indexcar');
    }  );

});

Route::get('/indexcar','CarController@indexcar')->middleware('can:manage2-users')->name('indexcar');

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("addcar",  'CarController@addcar' ,function(){
        return view ("addcar")->name('addcar');
    }  );

});

Route::get('/addcar','CarController@addcar')->middleware('can:manage2-users')->name('addcar');
Route::post('/storecar','CarController@storecar')->middleware('can:manage2-users')->name('storecar');

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("/car/editcar/{id}",  'CarController@editcar' ,function(){
        return view ("editcar")->name('editcar');
    }  );

});

Route::get('/car/editcar/{id}','CarController@editcar')->middleware('can:manage2-users')->name('editcar');
Route::post('/car/updatecar/{id}','CarController@updatecar')->middleware('can:manage2-users')->name('updatecar');
Route::get('/car/deletecar/{id}','CarController@deletecar')->middleware('can:manage2-users')->name('deletecar');

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("/carsearch",  'CarController@carsearch' ,function(){
        return view ("carsearch")->name('carsearch');
    }  );

});


Route::post('/carsearch', 'CarController@carsearch')->middleware('can:manage2-users')->name('carsearch');

/***************************route agence*******/

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get('/index','AgenceController@index',function(){
        return view ("index")->middleware('can:manage-users')->name('index');
    }  );

});




Route::get('/addagence','AgenceController@addagence')->middleware('can:manage-users')->name('addagence');
Route::post('/storeagence','AgenceController@storeagence')->middleware('can:manage-users')->name('storeagence');
Route::get('/agences_map', 'AgenceMapController@index')->name('outlet_map.index');
Route::post('/agence/updateagence/{id}','AgenceController@updateagence')->middleware('can:manage-users')->name('updateagence');
Route::get('/agence/deleteagence/{id}','AgenceController@deleteagence')->middleware('can:manage-users')->name('deleteagence');
Route::post('/agencesearch', 'AgenceController@agencesearch')->middleware('can:manage-users')->name('agencesearch');
Route::post('/agence/showagence/{id}','AgenceController@showagence')->middleware('can:manage-users')->name('showagence');
/***************************route Etablishment*******/
Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("indexetablissement",  'EtablissementController@indexetablissement' ,function(){
        return view ("indexetablissement")->name('indexetablissement');
    }  );

});

Route::get('/indexetablissement','EtablissementController@indexetablissement')->middleware('can:manage2-users')->name('indexetablissement');

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("addetablissement",  'EtablissementController@addetablissement' ,function(){
        return view ("addetablissement")->name('addetablissement');
    }  );

});


Route::get('/addetablissement','EtablissementController@addetablissement')->middleware('can:manage2-users')->name('addetablissement');
Route::post('/storeetablissement','EtablissementController@storeetablissement')->middleware('can:manage2-users')->name('storeetablissement');

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("/etablissement/editetablissement/{id}",  'EtablissementController@editetablissement' ,function(){
        return view ("editetablissement")->name('editetablissement');
    }  );

    Route::get("/indexetablissementimport",  'EtablissementController@indexetablissementimport' ,function(){
        return view ("indexetablissementimport")->name('indexetablissementimport');
    }  );

    Route::get('/indexetablissementimport','EtablissementController@indexetablissementimport')->middleware('can:manage-users')->name('indexetablissementimport');


});
Route::get('/etablissement/editetablissement/{id}','EtablissementController@editetablissement')->middleware('can:manage2-users')->name('editetablissement');
Route::post('/etablissement/updateetablissement/{id}','EtablissementController@updateetablissement')->middleware('can:manage2-users')->name('updateetablissement');
Route::get('/etablissement/deleteetablissement/{id}','EtablissementController@deleteetablissement')->middleware('can:manage2-users')->name('deleteetablissement');
Route::post('/etablissementsearch', 'EtablissementController@etablissementsearch')->middleware('can:manage2-users')->name('etablissementsearch');

Route::get('/import-formetablissement', 'EtablissementController@importFormEtablissement');

Route::post('/importetablissement', 'EtablissementController@importetablissement')->name('importetablissement');

Route::get('/indexetablissementimport','EtablissementController@indexetablissementimport')->middleware('can:manage-users')->name('indexetablissementimport');


/***************************route Subscription*******/



Route::get('/indexabonnementscolaire','AbonnementscolaireController@indexabonnementscolaire')->middleware('can:manage1-users')->name('indexabonnementscolaire');
Route::get('/addabonnementscolaire','AbonnementscolaireController@addabonnementscolaire')->middleware('can:manage1-users')->name('addabonnementscolaire');
Route::post('/storeabonnementscolaire','AbonnementscolaireController@storeabonnementscolaire')->middleware('can:manage1-users')->name('storeabonnementscolaire');
Route::get('/abonnementscolaire/editabonnementscolaire/{id}','AbonnementscolaireController@editabonnementscolaire')->name('editabonnementscolaire');
Route::post('/abonnementscolaire/updateabonnementscolaire/{id}','AbonnementscolaireController@updateabonnementscolaire')->name('updateabonnementscolaire');
Route::get('/abonnementscolaire/deleteabonnementscolaire/{id}','AbonnementscolaireController@deleteabonnementscolaire')->middleware('can:manage1-users')->name('deleteabonnementscolaire');
Route::post('/abonnementscolairesearch', 'AbonnementscolaireController@abonnementscolairesearch')->name('abonnementscolairesearch');
Route::get('/sidebarabonnementscolaire', 'AbonnementscolaireController@sidebarabonnementscolaire')->name('sidebarabonnementscolaire');

Route::get('/getAllAbonnementscolaire','AbonnementscolaireController@getAllAbonnementscolaire')->name('getAllAbonnementscolaire');

Route::resource('abonnementscolaires','AbonnementscolaireController');

Route::get('/showabonnementscolaire/{id}','AbonnementscolaireController@showabonnementscolaire')->name('showabonnementscolaire');

Route::get('/download-pdf','AbonnementscolaireController@downloadPDF')->name('downloadPDF');

Route::get('abonnementscolaire/pdfexport/{id}','AbonnementscolaireController@pdfexport');

Route::get('/import-formabonnementscolaire', 'AbonnementscolaireController@importFormAbonnementscolaire')->name('importFormAbonnementscolaire');
Route::post('/importabonnementscolaire', 'AbonnementscolaireController@importabonnementscolaire')->name('importabonnementscolaire');

Route::get('/indexabonnementscolaireimport','AbonnementscolaireController@indexabonnementscolaireimport')->middleware('can:manage-users')->name('indexabonnementscolaireimport');

Route::get('/prodview','AbonnementscolaireController@prodfunct');
Route::get('/findAbonnementscolaire','AbonnementscolaireController@findAbonnementscolaire');
Route::get('/findPrice','AbonnementscolaireController@findPrice');

Route::get('abonnementscolaire',[AbonnementscolaireController::class, 'index']);
Route::get('getregion',[AbonnementscolaireController::class, 'getregion'])->name('getregion');
Route::get('getMunicipalite',[AbonnementscolaireController::class, 'getMunicipalite'])->name('getMunicipalite');

/*********************route payement*************/

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("indexperiodeabonnement",  'PeriodeabonnementController@indexperiodeabonnement' ,function(){
        return view ("indexperiodeabonnement")->name('indexperiodeabonnement');
    }  );
    Route::get("addperiodeabonnement",  'PeriodeabonnementController@addperiodeabonnement' ,function(){
        return view ("addperiodeabonnement")->name('addperiodeabonnement');
    }  );
    Route::get("/periodeabonnement/editperiodeabonnement/{id}",  'PeriodeabonnementController@editperiodeabonnement' ,function(){
        return view ("editperiodeabonnement")->name('editperiodeabonnement');
    }  );



});


Route::get('/indexperiodeabonnement','PeriodeabonnementController@indexperiodeabonnement')->middleware('can:manage-users')->name('indexperiodeabonnement');
Route::get('/addperiodeabonnement','PeriodeabonnementController@addperiodeabonnement')->middleware('can:manage-users')->name('addperiodeabonnement');
Route::post('/storeperiodeabonnement','PeriodeabonnementController@storeperiodeabonnement')->middleware('can:manage-users')->name('storeperiodeabonnement');
Route::get('/periodeabonnement/editperiodeabonnement/{id}','PeriodeabonnementController@editperiodeabonnement')->middleware('can:manage-users')->name('editperiodeabonnement');
Route::post('/periodeabonnement/updateperiodeabonnement/{id}','PeriodeabonnementController@updateperiodeabonnement')->middleware('can:manage-users')->name('updateperiodeabonnement');
Route::get('/periodeabonnement/deleteperiodeabonnement/{id}','PeriodeabonnementController@deleteperiodeabonnement')->middleware('can:manage-users')->name('deleteperiodeabonnement');

/*********************route stations*************/

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("indexstation",  'StationController@indexstation' ,function(){
        return view ("indexstation")->name('indexstation');
    }  );
    Route::get("addstation",  'StationController@addstation' ,function(){
        return view ("addstation")->name('addstation');
    }  );
    Route::get("/station/editstation/{id}",  'StationController@editstation' ,function(){
        return view ("editstation")->name('editstation');
    }  );

    Route::get("indexstationimport",  'StationController@indexstationimport' ,function(){
        return view ("indexstationimport")->name('indexstationimport');
    }  );

    Route::get("/station/showstation/{id}",  'StationController@showstation' ,function(){
        return view ("showstation")->name('showstation');
    }  );

    Route::get('/station/showstation/{id}','StationController@showstation')->middleware('can:manage2-users')->name('showstation');


});


Route::get('/indexstation','StationController@indexstation')->middleware('can:manage2-users')->name('indexstation');
Route::get('/addstation','StationController@addstation')->middleware('can:manage2-users')->name('addstation');
Route::post('/storestation','StationController@storestation')->middleware('can:manage2-users')->name('storestation');
Route::get('/station/editstation/{id}','StationController@editstation')->middleware('can:manage2-users')->name('editstation');
Route::post('/station/updatestation/{id}','StationController@updatestation')->middleware('can:manage2-users')->name('updatestation');
Route::get('/station/deletestation/{id}','StationController@deletestation')->middleware('can:manage2-users')->name('deletestation');
Route::post('/stationsearch', 'StationController@stationsearch')->middleware('can:manage2-users')->name('stationsearch');

Route::get('/import-formstation', 'StationController@importFormStation')->middleware('can:manage2-users');

Route::post('/importstation', 'StationController@importstation')->middleware('can:manage2-users')->name('importstation');

Route::get('/indexstationimport','StationController@indexstationimport')->middleware('can:manage2-users')->name('indexstationimport');

Route::get('/station/showstation/{id}','StationController@showstation')->middleware('can:manage2-users')->name('showstation');
/***************************route municipalites*******/

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("indexmunicipalite",  'MunicipaliteController@indexmunicipalite' ,function(){
        return view ("indexmunicipalite")->name('indexmunicipalite');
    }  );
    Route::get("addmunicipalite",  'MunicipaliteController@addmunicipalite' ,function(){
        return view ("addmunicipalite")->name('addmunicipalite');
    }  );
    Route::get("/municipalite/editmunicipalite/{id}",  'MunicipaliteController@editmunicipalite' ,function(){
        return view ("editmunicipalite")->name('editmunicipalite');
    }  );

    Route::get("/indexmunicipaliteimport",  'MunicipaliteController@indexmunicipaliteimport' ,function(){
        return view ("indexmunicipaliteimport")->name('indexmunicipaliteimport');
    }  );

    Route::get('/indexmunicipaliteimport','MunicipaliteController@indexmunicipaliteimport')->middleware('can:manage-users')->name('indexmunicipaliteimport');


});



Route::get('/indexmunicipalite','MunicipaliteController@indexmunicipalite')->middleware('can:manage-users')->name('indexmunicipalite');
Route::get('/addmunicipalite','MunicipaliteController@addmunicipalite')->middleware('can:manage-users')->name('addmunicipalite');
Route::post('/storemunicipalite','MunicipaliteController@storemunicipalite')->middleware('can:manage-users')->name('storemunicipalite');
Route::get('/municipalite/editmunicipalite/{id}','MunicipaliteController@editmunicipalite')->middleware('can:manage-users')->name('editmunicipalite');
Route::post('/municipalite/updatemunicipalite/{id}','MunicipaliteController@updatemunicipalite')->middleware('can:manage-users')->name('updatemunicipalite');
Route::get('/municipalite/deletemunicipalite/{id}','MunicipaliteController@deletemunicipalite')->middleware('can:manage-users')->name('deletemunicipalite');

Route::get('/import-formmunicipalite', 'MunicipaliteController@importFormMunicipalite');

Route::post('/importmunicipalite', 'MunicipaliteController@importmunicipalite')->name('importmunicipalite');

Route::get('/indexmunicipaliteimport','MunicipaliteController@indexmunicipaliteimport')->middleware('can:manage-users')->name('indexmunicipaliteimport');

/*******************Studydetail*****************/

Route::get('/indexstudydetail','StudydetailController@indexstudydetail')->name('indexstudydetail');
Route::get('/addstudydetail','StudydetailController@addstudydetail')->name('addstudydetail');
Route::post('/storestudydetail','StudydetailController@storestudydetail')->name('storestudydetail');
Route::get('/studydetail/editstudydetail/{id}','StudydetailController@editstudydetail')->name('editstudydetail');
Route::post('/studydetail/updatestudydetail/{id}','StudydetailController@updatestudydetail')->name('updatestudydetail');
Route::get('/studydetail/deletestudydetail/{id}','StudydetailController@deletestudydetail')->name('deletestudydetail');

/*******************social*****************/

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("index1social",  'SocialController@index1social' ,function(){
        return view ("index1social")->name('index1social');
    }  );

});



Route::get('/indexsocial','SocialController@indexsocial')->middleware('can:manage-users')->name('indexsocial');

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("addsocial",  'SocialController@addsocial' ,function(){
        return view ("addsocial")->name('addsocial');
    }  );

});
Route::get('/addsocial','SocialController@addsocial')->middleware('can:manage-users')->name('addsocial');
Route::post('/storesocial','SocialController@storesocial')->middleware('can:manage-users')->name('storesocial');
Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("/social/editsocial/{id}",  'SocialController@editsocial' ,function(){
        return view ("editsocial")->name('editsocial');
    }  );

    Route::get("indexsocialimport",  'SocialController@indexsocialimport' ,function(){
        return view ("indexsocialimport")->name('indexsocialimport');
    }  );

    Route::get('/indexsocialimport','SocialController@indexsocialimport')->middleware('can:manage-users')->name('indexsocialimport');

});


Route::get('/social/editsocial/{id}','SocialController@editsocial')->middleware('can:manage-users')->name('editsocial');
Route::post('/social/updatesocial/{id}','SocialController@updatesocial')->middleware('can:manage-users')->name('updatesocial');
Route::get('/social/deletesocial/{id}','SocialController@deletesocial')->middleware('can:manage-users')->name('deletesocial');
Route::post('/socialsearch', 'SocialController@socialsearch')->middleware('can:manage-users')->name('socialsearch');


Route::get('/index1social','SocialController@index1social')->middleware('can:manage-users')->name('index1social');

Route::post('indexsocial/insert', 'SocialController@insert')->name('indexsocial.insert');

Route::post('/sumbitData','SocialController@sumbitData')->middleware('can:manage-users')->name('sumbitData');

Route::get('/import-formsocial', 'SocialController@importFormsocial');

Route::get('/indexsocialimport','SocialController@indexsocialimport')->middleware('can:manage-users')->name('indexsocialimport');

Route::post('/importsocial', 'SocialController@importsocial')->name('importsocial');

/************************* Route Client ***********************************/


Route::get('deconnexion','Auth\LoginController@logout')->name('deconnexion');


/************************* Route role user  ***********************************/


/* creation des route automatique avec le prefix admin et ajout d'un droit de vite de page avec un middleware*/

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function() {

    Route::resource('users', 'UsersController');

    Route::post('/upload',function () {
        dd('sdf');
    });


});


/*******************route ligne*******/
Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("indexligne",  'LigneController@indexligne' ,function(){
        return view ("indexligne")->name('indexligne');
    }  );
    Route::get("addligne",  'LigneController@addligne' ,function(){
        return view ("addligne")->name('addligne');
    }  );
    Route::get("/ligne/editligne/{id}",  'LigneController@editligne' ,function(){
        return view ("editligne")->name('editligne');
    }  );

    Route::get("/indexligneimport",  'LigneController@indexligneimport' ,function(){
        return view ("indexligneimport")->name('indexligneimport');
    }  );

    Route::get("/showligne/{id}",  'LigneController@showligne' ,function(){
        return view ("showligne")->name('showligne');
    }  );

    Route::get('/showligne/{id}','ligneController@showligne')->name('showligne');

    Route::get('/indexligneimport','LigneController@indexligneimport')->middleware('can:manage2-users')->name('indexligneimport');

});

Route::get('/indexligne','LigneController@indexligne')->middleware('can:manage2-users')->name('indexligne');
Route::get('/addligne','LigneController@addligne')->middleware('can:manage2-users')->name('addligne');
Route::post('/storeligne','LigneController@storeligne')->middleware('can:manage2-users')->name('storeligne');
Route::get('/ligne/editligne/{id}','LigneController@editligne')->middleware('can:manage2-users')->name('editligne');
Route::post('/ligne/updateligne/{id}','LigneController@updateligne')->middleware('can:manage2-users')->name('updateligne');
Route::get('/ligne/deleteligne/{id}','LigneController@deleteligne')->middleware('can:manage2-users')->name('deleteligne');
Route::post('/lignesearch', 'LigneController@lignesearch')->middleware('can:manage2-users')->name('lignesearch');
Route::get('/import-formligne', 'LigneController@importFormligne');
Route::get('/indexligneimport','LigneController@indexligneimport')->middleware('can:manage2-users')->name('indexligneimport');


Route::post('/importligne', 'LigneController@importligne')->middleware('can:manage2-users')->name('importligne');

Route::get('/showligne/{id}','ligneController@showligne')->name('showligne');
//User update

// Utilisateur authentifié
// Utilisateur authentifié
Route::middleware('auth')->group(function () {
    // Gestion du compte
    Route::prefix('compte')->group(function () {
        Route::name('account')->get('/', 'AccountController');
        Route::name('identite.edit')->get('identite', 'IdentiteController@edit');
        Route::name('identite.update')->put('identite', 'IdentiteController@update');
        Route::name('rgpd')->get('rgpd', 'IdentiteController@rgpd');
        Route::name('rgpd.pdf')->get('rgpd/pdf', 'IdentiteController@pdf');
    });

});

//// final profile
Route::group(['middleware' => 'auth'], function () {

    Route::get('profile', 'ProfileController@edit')
        ->name('profile.edit');

    Route::patch('profile', 'ProfileController@update')
        ->name('profile.update');
});

// clear cache


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});




//

Route::get('/indexlog','UserController@indexlog')->middleware('can:manage-users')->name('indexlog');

/********** Route Etudiant ***************/

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("indexetudiant",  'EtudiantController@indexetudiant' ,function(){
        return view ("indexetudiant")->name('indexetudiant');
    }  );
    Route::get("addetudiant",  'EtudiantController@addetudiant' ,function(){
        return view ("addetudiant")->name('addetudiant');
    }  );
    Route::get("/etudiant/editetudiant/{id}",  'EtudiantController@editetudiant' ,function(){
        return view ("editetudiant")->name('editetudiant');
    }  );



});



Route::get('/indexetudiant','EtudiantController@indexetudiant')->middleware('can:manage-users')->name('indexetudiant');
Route::get('/addetudiant','EtudiantController@addetudiant')->middleware('can:manage-users')->name('addetudiant');
Route::post('/storeetudiant','EtudiantController@storeetudiant')->middleware('can:manage-users')->name('storeetudiant');
Route::get('/etudiant/editetudiant/{id}','EtudiantController@editetudiant')->middleware('can:manage-users')->name('editetudiant');
Route::post('/etudiant/updateetudiant/{id}','EtudiantController@updateetudiant')->middleware('can:manage-users')->name('updateetudiant');
Route::get('/etudiant/deleteetudiant/{id}','EtudiantController@deleteetudiant')->middleware('can:manage-users')->name('deleteetudiant');
Route::post('/etudiantsearch', 'EtudiantController@etudiantsearch')->middleware('can:manage-users')->name('etudiantsearch');


/********** Route Classe ***************/
Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("indexclasse",  'ClasseController@indexclasse' ,function(){
        return view ("indexclasse")->name('indexclasse');
    }  );
    Route::get("addclasse",  'ClasseController@addclasse' ,function(){
        return view ("addclasse")->name('addclasse');
    }  );
    Route::get("/classe/editclasse/{id}",  'ClasseController@editclasse' ,function(){
        return view ("editclasse")->name('editclasse');
    }  );



});
Route::get('/indexclasse','ClasseController@indexclasse')->middleware('can:manage-users')->name('indexclasse');
Route::get('/addclasse','ClasseController@addclasse')->middleware('can:manage-users')->name('addclasse');
Route::post('/storeclasse','ClasseController@storeclasse')->middleware('can:manage-users')->name('storeclasse');
Route::get('/classe/editclasse/{id}','ClasseController@editclasse')->middleware('can:manage-users')->name('editclasse');
Route::post('/classe/updateclasse/{id}','ClasseController@updateclasse')->middleware('can:manage-users')->name('updateclasse');
Route::get('/classe/deleteclasse/{id}','ClasseController@deleteclasse')->middleware('can:manage-users')->name('deleteclasse');
Route::post('/classesearch', 'ClasseController@etudiantsearch')->middleware('can:manage-users')->name('classesearch');

/********** Route Societe ***************/

Route::get('/indexsociete','SocieteController@indexsociete')->name('indexsociete');
Route::get('/addsociete','SocieteController@addsociete')->name('addsociete');
Route::post('/storesociete','SocieteController@storesociete')->name('storesociete');
Route::get('/societe/editsociete/{id}','SocieteController@editsociete')->name('editsociete');
Route::post('/societe/updatesociete/{id}','SocieteController@updatesociete')->name('updatesociete');
Route::get('/societe/deletesociete/{id}','SocieteController@deletesociete')->name('deletesociete');
Route::post('/societesearch', 'SocieteController@societesearch')->name('societesearch');

/********** Route Abonno ***************/

Route::get('/abonno', 'HomeController@abonno')->middleware('can:manage1-users')->name('abonno');

Route::get('/listeabonno', 'HomeController@listeabonno')->name('listeabonno');

/***************************route Subscription*******/

Route::get('/indexabonnementcivile','AbonnementcivileController@indexabonnementcivile')->name('indexabonnementcivile');
Route::get('/addabonnementcivile','AbonnementcivileController@addabonnementcivile')->middleware('can:manage1-users')->name('addabonnementcivile');
Route::post('/storeabonnementcivile','AbonnementcivileController@storeabonnementcivile')->middleware('can:manage1-users')->name('storeabonnementcivile');
Route::get('/abonnementcivile/editabonnementcivile/{id}','AbonnementcivileController@editabonnementcivile')->name('editabonnementcivile');
Route::post('/abonnementcivile/updateabonnementcivile/{id}','AbonnementcivileController@updateabonnementcivile')->name('updateabonnementcivile');
Route::get('/abonnementcivile/deleteabonnementcivile/{id}','AbonnementcivileController@deleteabonnementcivile')->middleware('can:manage1-users')->name('deleteabonnementcivile');
Route::post('/abonnementcivilesearch', 'AbonnementcivileController@abonnementcivilesearch')->name('abonnementcivilesearch');
Route::get('/sidebarabonnementcivile', 'AbonnementcivileController@sidebarabonnementcivile')->name('sidebarabonnementcivile');
Route::get('/getAllAbonnementcivile','AbonnementcivileController@getAllAbonnementcivile')->name('getAllAbonnementcivile');

Route::get('/download-pdf1','AbonnementcivileController@downloadPDF1')->name('downloadPDF1');

Route::get('/showcivile/{id}','AbonnementcivileController@showcivile')->name('showcivile');

Route::get('/import-formabonnementcivile', 'AbonnementcivileController@importFormAbonnementcivile')->name('importFormAbonnementcivile');
Route::post('/importabonnementcivile', 'AbonnementcivileController@importabonnementcivile')->name('importabonnementcivile');

Route::get('/indexabonnementcivileimport','AbonnementcivileController@indexabonnementcivileimport')->middleware('can:manage-users')->name('indexabonnementcivileimport');





/***************************route Abonnement sociale*******/

Route::get('/indexabonnementsociale','AbonnementsocialeController@indexabonnementsociale')->name('indexabonnementsociale');
Route::get('/addabonnementsociale','AbonnementsocialeController@addabonnementsociale')->middleware('can:manage1-users')->name('addabonnementsociale');
Route::post('/storeabonnementsociale','AbonnementsocialeController@storeabonnementsociale')->middleware('can:manage1-users')->name('storeabonnementsociale');
Route::get('/abonnementsociale/editabonnementsociale/{id}','AbonnementsocialeController@editabonnementsociale')->name('editabonnementsociale');
Route::post('/abonnementsociale/updateabonnementsociale/{id}','AbonnementsocialeController@updateabonnementsociale')->name('updateabonnementsociale');
Route::get('/abonnementsociale/deleteabonnementsociale/{id}','AbonnementsocialeController@deleteabonnementsociale')->middleware('can:manage1-users')->name('deleteabonnementsociale');
Route::post('/abonnementsocialesearch', 'AbonnementsocialeController@abonnementsocialesearch')->middleware('can:manage1-users')->name('abonnementsocialesearch');
Route::get('/sidebarabonnementsociale', 'AbonnementsocialeController@sidebarabonnementsociale')->name('sidebarabonnementsociale');

Route::get('/import-formabonnementsociale', 'AbonnementsocialeController@importFormAbonnementsociale');

Route::post('/importabonnementsociale', 'AbonnementsocialeController@importabonnementsociale')->name('importabonnementsociale');

Route::get('/indexabonnementsocialeimport','AbonnementsocialeController@indexabonnementsocialeimport')->middleware('can:manage-users')->name('indexabonnementsocialeimport');

Route::get('/showsociale/{id}','AbonnementsocialeController@showsociale')->name('showsociale');

Route::get('/getAllAbonnementsociale','AbonnementsocialeController@getAllAbonnementsociale')->name('getAllAbonnementsociale');


Route::get('/download-pdf2','AbonnementsocialeController@downloadPDF2')->name('downloadPDF2');



/**************************route Region**************/
Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("indexregion",  'RegionController@indexregion' ,function(){
        return view ("indexregion")->name('indexregion');
    }  );

});
Route::get('/indexregion','RegionController@indexregion')->middleware('can:manage-users')->name('indexregion');

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("addregion",  'RegionController@addregion' ,function(){
        return view ("addregion")->name('addregion');
    }  );

});

Route::get('/addregion','RegionController@addregion')->middleware('can:manage-users')->name('addregion');
Route::post('/storeregion','RegionController@storeregion')->middleware('can:manage-users')->name('storeregion');

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("/region/editregion/{id}",  'RegionController@editregion' ,function(){
        return view ("editregion")->name('editregion');
    }  );
    Route::get("indexregionimport",  'RegionController@indexregionimport' ,function(){
        return view ("indexregionimport")->name('indexregionimport');
    }  );

    Route::get('/indexregionimport','RegionController@indexregionimport')->middleware('can:manage-users')->name('indexregionimport');
});


Route::get('/region/editregion/{id}','RegionController@editregion')->middleware('can:manage-users')->name('editregion');
Route::post('/region/updateregion/{id}','RegionController@updateregion')->middleware('can:manage-users')->name('updateregion');
Route::get('/region/deleteregion/{id}','RegionController@deleteregion')->middleware('can:manage-users')->name('deleteregion');
Route::post('/regionsearch', 'RegionController@regionsearch')->middleware('can:manage-users')->name('regionsearch');
Route::get('/import-formregion', 'RegionController@importFormRegion')->name('importFormRegion');
Route::post('/importregion', 'RegionController@importregion')->name('importregion');

Route::get('/indexregionimport','RegionController@indexregionimport')->middleware('can:manage-users')->name('indexregionimport');

/**************************/

Route::get('/get/etudiant/{id}','AbonnementscolaireController@getEtudiants')->name('getEtudiants');

Route::get('/view/etudiant/{id}','AbonnementscolaireController@getSubscription')->name('getSubscription');


Route::get('/downloadpdf/{id}','AbonnementscolaireController@downloadpdf')
    ->name('downloadpdf');

/********** Route Annee ***************/

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("indexannee",  'AnneeController@indexannee' ,function(){
        return view ("indexannee")->name('indexannee');
    }  );

});


Route::get('/indexannee','AnneeController@indexannee')->middleware('can:manage-users')->name('indexannee');

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("addannee",  'AnneeController@addannee' ,function(){
        return view ("addannee")->name('addannee');
    }  );

});

Route::get('/addannee','AnneeController@addannee')->middleware('can:manage-users')->name('addannee');
Route::post('/storeannee','AnneeController@storeannee')->middleware('can:manage-users')->name('storeannee');

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("/annee/editannee/{id}",  'AnneeController@editannee' ,function(){
        return view ("editannee")->name('editannee');
    }  );

});

Route::get('/annee/editannee/{id}','AnneeController@editannee')->middleware('can:manage-users')->name('editannee');
Route::post('/annee/updateannee/{id}','AnneeController@updateannee')->middleware('can:manage-users')->name('updateannee');
Route::get('/annee/deleteannee/{id}','AnneeController@deleteannee')->middleware('can:manage-users')->name('deleteannee');

/********** Route Annee ***************/

Route::get('/indexannee','AnneeController@indexannee')->middleware('can:manage-users')->name('indexannee');
Route::get('/addannee','AnneeController@addannee')->middleware('can:manage-users')->name('addannee');
Route::post('/storeannee','AnneeController@storeannee')->middleware('can:manage-users')->name('storeannee');
Route::get('/annee/editannee/{id}','AnneeController@editannee')->middleware('can:manage-users')->name('editannee');
Route::post('/annee/updateannee/{id}','AnneeController@updateannee')->middleware('can:manage-users')->name('updateannee');
Route::get('/annee/deleteannee/{id}','AnneeController@deleteannee')->middleware('can:manage-users')->name('deleteannee');

/********** Route Niveau scolaire ***************/
Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("indexniveauscolaire",  'NiveauscolaireController@indexniveauscolaire' ,function(){
        return view ("indexniveauscolaire")->name('indexniveauscolaire');
    }  );
    Route::get("addniveauscolaire",  'NiveauscolaireController@addniveauscolaire' ,function(){
        return view ("addniveauscolaire")->name('addniveauscolaire');
    }  );
    Route::get("/niveauscolaire/editniveauscolaire/{id}",  'NiveauscolaireController@editniveauscolaire' ,function(){
        return view ("editniveauscolaire")->name('editniveauscolaire');
    }  );



});
Route::get('/indexniveauscolaire','NiveauscolaireController@indexniveauscolaire')->middleware('can:manage-users')->name('indexniveauscolaire');
Route::get('/addniveauscolaire','NiveauscolaireController@addniveauscolaire')->middleware('can:manage-users')->name('addniveauscolaire');
Route::post('/storeniveauscolaire','NiveauscolaireController@storeniveauscolaire')->middleware('can:manage-users')->name('storeniveauscolaire');
Route::get('/niveauscolaire/editniveauscolaire/{id}','NiveauscolaireController@editniveauscolaire')->middleware('can:manage-users')->name('editniveauscolaire');
Route::post('/niveauscolaire/updateniveauscolaire/{id}','NiveauscolaireController@updateniveauscolaire')->middleware('can:manage-users')->name('updateniveauscolaire');
Route::get('/niveauscolaire/deleteniveauscolaire/{id}','NiveauscolaireController@deleteniveauscolaire')->middleware('can:manage-users')->name('deleteniveauscolaire');

/********** Route typesetablissement ***************/
Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("indextypesetablissement",  'TypesetablissementController@indextypesetablissement' ,function(){
        return view ("indextypesetablissement")->name('indextypesetablissement');
    }  );
    Route::get("addtypesetablissement",  'TypesetablissementController@addtypesetablissement' ,function(){
        return view ("addtypesetablissement")->name('addtypesetablissement');
    }  );
    Route::get("/typesetablissement/edittypesetablissement/{id}",'TypesetablissementController@edittypesetablissement' ,function(){
        return view ("edittypesetablissement")->name('edit');
    }  );



});
Route::get('/indextypesetablissement','TypesetablissementController@indextypesetablissement')->middleware('can:manage-users')->name('indextypesetablissement');
Route::get('/addtypesetablissement','TypesetablissementController@addtypesetablissement')->middleware('can:manage-users')->name('addtypesetablissement');
Route::post('/storetypesetablissement','TypesetablissementController@storetypesetablissement')->middleware('can:manage-users')->name('storetypesetablissement');
Route::get('/typesetablissement/edittypesetablissement/{id}','TypesetablissementController@edittypesetablissement')->middleware('can:manage-users')->name('edittypesetablissement');
Route::post('/typesetablissement/updatetypesetablissement/{id}','TypesetablissementController@updatetypesetablissement')->middleware('can:manage-users')->name('updatetypesetablissement');
Route::get('/typesetablissement/deletetypesetablissement/{id}','TypesetablissementController@deletetypesetablissement')->middleware('can:manage-users')->name('deletetypesetablissement');

/********** Route typesetablissement ***************/

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("indextypedepaiement",  'TypedepaiementController@indextypedepaiement' ,function(){
        return view ("indextypedepaiement")->name('indextypedepaiement');
    }  );

});


Route::get('/indextypedepaiement','TypedepaiementController@indextypedepaiement')->middleware('can:manage-users')->name('indextypedepaiement');

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("addtypedepaiement",  'TypedepaiementController@addtypedepaiement' ,function(){
        return view ("addtypedepaiement")->name('addtypedepaiement');
    }  );

});


Route::get('/addtypedepaiement','TypedepaiementController@addtypedepaiement')->middleware('can:manage-users')->name('addtypedepaiement');
Route::post('/storetypedepaiement','TypedepaiementController@storetypedepaiement')->middleware('can:manage-users')->name('storetypedepaiement');

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get('/typedepaiement/edittypedepaiement/{id}',  'TypedepaiementController@edittypedepaiement' ,function(){
        return view ("edittypedepaiement")->name('edittypedepaiement');
    }  );

});

Route::get('/typedepaiement/edittypedepaiement/{id}','TypedepaiementController@edittypedepaiement')->middleware('can:manage-users')->name('edittypedepaiement');
Route::post('/typedepaiement/updatetypedepaiement/{id}','TypedepaiementController@updatetypedepaiement')->middleware('can:manage-users')->name('updatetypedepaiement');
Route::get('/typedepaiement/deletetypedepaiement/{id}','TypedepaiementController@deletetypedepaiement')->middleware('can:manage-users')->name('deletetypedepaiement');

/*********Agency***********/


Route::resource('agences', 'AgenceController')->middleware('can:manage2-users');

Route::post('/store','AgenceController@store')->middleware('can:manage-users')->name('store');

Route::get('/agence/edit/{id}','AgenceController@edit')->middleware('can:manage-users')->name('edit');

Route::get('/agence/show/{id}','AgenceController@show')->middleware('can:manage-users')->name('show');

Route::get('/post', 'PostController@index')->name('post.index');

Route::get('/dashboard','HomeController@dashboard')->name('dashboard');

Route::get('/dashboard1','HomeController@dashboard1')->name('dashboard1');

Route::get('/dashboard2','HomeController@dashboard2')->name('dashboard2');



Route::post('/home3','HomeController@home3')->name('home3');

Route::view('profile1','profile1');

Route::get('/profile1/{lang}', function ($lang) {
    App::setLocale($lang);
    return view('profile1');
});
/**********localisation******/

Route::group(['prefix' => LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function() {
    Route::get("test", function(){
        return view ("test");
    }  );

});

Route::get('/our_outlets', 'OutletMapController@index')->name('outlet_map.index');
Route::resource('outlets', 'OutletController');
Route::get('/indexoutlets', 'OutletMapController@index');

Route::get('/our_stations', 'StationMapController@index')->name('station_map.index');
Route::resource('stations', 'StationController');

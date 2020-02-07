<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
Auth::routes(['verify' => true]);

Route::post("/suite/ajouter", "InscriptionsController@inscriptions_suite")->name('suite.ajouter');
        Route::get("/info/suite", "InscriptionsController@form_suite")->name('info.suite');
        Route::get("/reussi", "InscriptionsController@form_valide")->name('reussi');

    Route::get('/liste_etudiant_interne', 'InscriptionsController@etudiantinterne')->middleware('admin');
    Route::get('/liste_etudiant_externe', 'InscriptionsController@etudiantexterne')->middleware('admin');

    Route::get('/liste_finale_interne', 'InscriptionsController@finale_interne')->middleware('admin');
    Route::get('/liste_finale_externe', 'InscriptionsController@finale_externe')->middleware('admin');

    Route::get('/bourse_excellence', 'InscriptionsController@bourse_excellence')->name('bourse_excellence');
    Route::get('/bourse_merite', 'InscriptionsController@bourse_merite')->name('bourse_merite');
    Route::get('/bourse_solidarite', 'InscriptionsController@bourse_solidarite')->name('bourse_solidarite');
    Route::get('/bourse_afrique', 'InscriptionsController@bourse_afrique')->name('bourse_afrique');

    Route::get('/plusuniversiteuemf', 'InscriptionsController@plusuniversiteuemf')->name('plusuniversiteuemf');

$router->group(['middleware' => ['auth']], function () {

    Route::get("/inscriptions/detail/{id}", "InscriptionsController@delete_inscription")->name("delete_inscription");
    Route::get("/inscriptions/edit/{id}", "InscriptionsController@edit")->name("inscriptions.edit");
    Route::post("/inscriptions/update/{id}", "InscriptionsController@update")->name("inscriptions.update");

    Route::get('/home', 'InscriptionsController@index')->name('home')->middleware("CheckInscription"); //>middleware('verified'); // verification in controller
    //Route::post('/inscriptionpremier' , 'Inscriptionintern@store')->name('inscriptionpremier');
    Route::post("/inscription", "InscriptionsController@ajouter")->name("ajouter_inscription");
    Route::post('/inscriptioninterne', 'InscriptionsController@ajouterinterne')->name('inscriptioninterne');
    Route::post('/inscriptionexterne', 'InscriptionsController@ajouterexterne')->name('inscriptionexterne');

    Route::get('/liste_info', 'InscriptionsController@show')->name('liste_info');
    Route::get('/liste_info_externe', 'InscriptionsController@show_externe')->name('liste_info_externe');

    Route::get('/telecharger_pdf', 'InscriptionsController@exportpdf')->name('telecharger_pdf');
    Route::get('/telecharger_externe_pdf', 'InscriptionsController@exportpdf_externe')->name('telecharger_externe_pdf');

    Route::group(['prefix' => "admin", 'middleware' => ['auth' => 'admin']], function () {

        Route::get('/gestion', 'InscriptionsController@gestionall')->name('gestion');

        //routes for universites
        Route::get('/universites', 'UniversiteController@index')->name('universites');
        Route::get('/universite/edit/{id}', 'UniversiteController@edit')->name('universite.edit');
        Route::get('/universite/delete/{id}', 'UniversiteController@destroy')->name('universite.delete');
        Route::get('/universite/create', 'UniversiteController@create')->name('universite.create');
        Route::post('/universite/store', 'UniversiteController@store')->name('universite.store');
        Route::post('/universite/update/{id}', 'UniversiteController@update')->name('universite.update');

        //routes for domaines
        Route::get('/domaines', 'DomaineController@index')->name('domaines');
        Route::get('/domaine/edit/{id}', 'DomaineController@edit')->name('domaine.edit');
        Route::get('/domaine/delete/{id}', 'DomaineController@destroy')->name('domaine.delete');
        Route::get('/domaine/create', 'DomaineController@create')->name('domaine.create');
        Route::post('/domaine/store', 'DomaineController@store')->name('domaine.store');
        Route::post('/domaine/update/{id}', 'DomaineController@update')->name('domaine.update');

        Route::post("/export_excel/excel/", "InscriptionsController@exportexterne")->name('export_excel.excel');
        //Route::get("/export_excel/interne/ ", "InscriptionsController@exportinterne")->name('export_excel.interne');
        Route::post("/export_excel/in/", "InscriptionsController@exportinterne")->name('export_excel.in');

        Route::post("/export_excel/finale/", "InscriptionsController@exportfinaleexterne")->name('export_excel.finale');

        Route::post("/export_excel/interne/", "InscriptionsController@exportfinaleinterne")->name('export_excel.interne');

    });

        Route::post('/inscriptioninterne', 'InscriptionsController@internesearch')->name('inscriptioninterne');
        Route::post('/inscriptionexterne', 'InscriptionsController@externesearch')->name('inscriptionexterne');

        Route::post('/externe_search_final', 'InscriptionsController@externe_search_final')->name('externe_search_final');
        Route::post('/interne_search_final', 'InscriptionsController@interne_search_final')->name('interne_search_final');



        Route::get("/inscriptions", "InscriptionsController@liste_inscriptions");

        Route::get("/info", "InscriptionsController@detail_inscriptions");

    Route::get("/get_directions/{id_aref}", function ($id_aref) {
        $directions = App\Directionprovinciale::where("id_aref_fk", "=", $id_aref)->get();
        return view("ajax-views.select_directions", compact("directions"));
    });

    Route::get("/get_domaines/{id_universite}", function ($id_universite) {
        $domaines = App\Domaine::where("id_universite_fk", "=", $id_universite)->get();
        return view("ajax-views.select_domaines", compact("domaines"));
    });

    Route::get("/get_fillieres/{id_domaine}", function ($id_domaine) {
        $fillieres = App\Filiere::where("id_domaine_fk", "=", $id_domaine)->get();
        return view("ajax-views.select_fillieres", compact("fillieres"));
    });
});

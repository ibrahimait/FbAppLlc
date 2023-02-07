<?php

namespace routes;

use App\Models\Segement;
// ressviews

use App\Models\ambassadeurGroupe;
use Illuminate\Support\Facades\Auth;
use App\Models\Groupeavecambassadeur;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\ContactController;

//getviews
use App\Http\Controllers\AdhesionController;
use App\Http\Controllers\CampagneController;
use App\Http\Controllers\PostMereController;
use App\Http\Controllers\SegementController;
use App\Http\Controllers\PostGroupeController;
use App\Http\Controllers\QuestionadController;
use App\Http\Controllers\RelevecentController;
use App\Http\Controllers\ReleveinfoController;
use App\Http\Controllers\AdhmanuelleController;
use App\Http\Controllers\AmbassadeurController;
use App\Http\Controllers\AnalysetagsController;
use App\Http\Controllers\EngagementsController;
use App\Http\Controllers\InsightpageController;
use App\Http\Controllers\InsightpostController;
use App\Http\Controllers\PostPartageController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\NotificationController;

//Campagnes
use App\Http\Controllers\CampagnesdashboardController;
use App\Http\Controllers\DashboarduserController;
use App\Http\Controllers\OnboardgroupeController;
use App\Http\Controllers\PubliergroupeController;
use App\Http\Controllers\SegementationController;
use App\Http\Controllers\AnalysecampagneController;
use App\Http\Controllers\ProcesscampagneController;

Route::get('/analysecampagne', [AnalysecampagneController::class, 'index'])->name('analysecampagne');
Route::get('/processcampagne', [ProcesscampagneController::class, 'index'])->name('processcampagne');
Route::get('/campagnesdashboard', [CampagnesdashboardController::class, 'index'])->name('campagnesdashboard');

use App\Http\Controllers\GroupecampagneController;

Route::get('groupecampagnes.index', [GroupecampagneController::class, 'index'])->name('groupecampagnes.index');
//Route::post('groupecampagnes', [GroupecampagneController::class, 'cherchSeg'])->name('groupecampagnes');
Route::post('groupecampagnes', [GroupecampagneController::class, 'insert'])->name('groupecampagnes.insert');
// Route::get('/cherchSeg', [GroupecampagneController::class, 'cherchSeg'])->name('cherchSeg');
//Route::post('groupecampagnes', [GroupecampagneController::class, 'store'])->name('groupecampagnes.store');
Route::get('AjoutSegments', [GroupecampagneController::class, 'AjoutSegments'])->name('groupecampagnes.AjoutSegments');
Route::any('cherchSeg/{id}', [GroupecampagneController::class, 'cherchSeg'])->name('cherchSeg');
Route::get('/multisearch_camp', [CampagneController::class, 'multisearch_camp'])->name('multisearch_camp');
Route::delete('/deleteall_c', [CampagneController::class, 'deleteall_c'])->name('deleteall_c');
Route::resource('campagnes', CampagneController::class);
Route::resource('groupecampagnes', GroupecampagneController::class);

//Posts
use App\Http\Controllers\PostsdashboardController;
use App\Http\Controllers\segementGroupeController;
use App\Http\Controllers\DashboardpostmereController;
use App\Http\Controllers\DashboardpostgroupeController;
use App\Http\Controllers\RecherchegroupeController;
use App\Http\Controllers\TeamperformanceController;
use App\Http\Controllers\DashboardpostpartageController;
use App\Http\Controllers\WelcomedashboardController;

Route::get('/welcomedashboard', [WelcomedashboardController::class, 'index'])->name('welcomedashboard');
Route::get('/dashboardpostmere', [DashboardpostmereController::class, 'index'])->name('dashboardpostmere');
Route::get('/dashboardpostpartage', [DashboardpostpartageController::class, 'index'])->name('dashboardpostpartage');
Route::get('/dashboardpostgroupe', [DashboardpostgroupeController::class, 'index'])->name('dashboardpostgroupe');
Route::resource('postmeres', PostMereController::class);
Route::resource('postpartages', PostPartageController::class);
Route::resource('postgroupes', PostGroupeController::class);

// User
use App\Http\Controllers\GroupesdashboardController;

use App\Http\Controllers\ambassadeurGroupeController;
use App\Http\Controllers\DashboardaudiencegroupeController;
use App\Http\Controllers\DashboardlalachanteengageController;

Route::resource('utilisateurs', UtilisateurController::class);
Route::get('/dashboarduser', [DashboarduserController::class, 'index'])->name('dashboarduser');
Route::get('/dashboardaudiencegroupe', [DashboardaudiencegroupeController::class, 'index'])->name('dashboardaudiencegroupe');
Route::get('/dashboardlalachanteengage', [DashboardlalachanteengageController::class, 'index'])->name('dashboardlalachanteengage');

// Performance
use App\Http\Controllers\GroupeperformanceController;
use App\Http\Controllers\GroupesanssegmentController;
use App\Http\Controllers\SegmentsdashboardController;
use App\Http\Controllers\CampagneperformanceController;
use App\Http\Controllers\DashboardstrategieController;
use App\Http\Controllers\SegmentperformanceController;
use App\Http\Controllers\SegmentationperformanceController;
use App\Http\Controllers\AmbassadeurperformanceController;

Route::get('/groupeperformance', [GroupeperformanceController::class, 'index'])->name('groupeperformance');
Route::get('/campagneperformance', [CampagneperformanceController::class, 'index'])->name('campagneperformance');
Route::get('/segmentperformance', [SegmentperformanceController::class, 'index'])->name('segmentperformance');
Route::get('/segmentationperformance', [SegmentationperformanceController::class, 'index'])->name('segmentationperformance');
Route::get('/teamperformance', [TeamperformanceController::class, 'index'])->name('teamperformance');
Route::get('/ambassadeurperformance', [AmbassadeurperformanceController::class, 'index'])->name('ambassadeurperformance');

// Data Analyse

Route::get('/analysetags', [AnalysetagsController::class, 'index'])->name('analysetags');

// Stratégie
use App\Http\Controllers\CherchepublicationsController;
use App\Http\Controllers\PlanificationcampagnesController;
use App\Http\Controllers\PartagepublicationsController;

Route::resource('ambassadeurs', AmbassadeurController::class);
Route::get('/dashboardstrategie', [DashboardstrategieController::class, 'index'])->name('dashboardstrategie');
Route::get('/planificationcampagnes', [PlanificationcampagnesController::class, 'index'])->name('planificationcampagnes');

// Administration
// use App\Http\Controllers\GroupesansambassadeurController;
use App\Http\Controllers\AdministrationlistesController;
use App\Http\Controllers\OptimisationactiviteController;
use App\Http\Controllers\GroupeavecambassadeurController;
use App\Http\Controllers\GroupeavecsegmentationController;
use App\Http\Controllers\GroupesanssegmentationController;


Route::resource('users', UserController::class);
Route::get('/administrationlistes', [AdministrationlistesController::class, 'index'])->name('administrationlistes');
Route::get('/crud', [CrudController::class, 'index'])->name('crud');

//Auth
Auth::routes();

// Ressource
Route::resource('segements', SegementController::class);
Route::resource('ambassadeurs', AmbassadeurController::class);
Route::resource('segementations', SegementationController::class);

Route::resource('deleteseg', SegementationController::class);
Route::resource('groupes', GroupeController::class);
Route::resource('groupesansambassadeurs', GroupesansambassadeurController::class);
Route::resource('groupeavecambassadeurs', GroupeavecambassadeurController::class);
Route::resource('groupeavecsegmentations', GroupeavecsegmentationController::class);
Route::resource('groupesanssegmentations', GroupesanssegmentationController::class);
Route::resource('groupesanssegments', GroupesanssegmentController::class);
Route::resource('questionads', QuestionadController::class);
Route::resource('adhmanuelles', AdhmanuelleController::class);
Route::resource('AmbassadeurGroupe', ambassadeurGroupe::class);

// Get
Route::get('logout', '\App\Http\Controllers\auth\LoginController@logout');
Route::get('/', function () {
    return view('auth/login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
// ambassadeur_groupe

// Route::get('AmbassadeurGroupe.index/{id_utilisateur}', [ambassadeurGroupeController::class, 'index'])->name('AmbassadeurGroupe.index');
// Route::get('AmbassadeurGroupe', [ambassadeurGroupeController::class, 'destroy'])->name('AmbassadeurGroupe');
// Route::get('AmbassadeurGroupe', [ambassadeurGroupeController::class, 'getAllGroupeAmb'])->name('ambassadeurs');
// //Route::get('ambassadeurs', [AmbassadeurController::class, 'getAll'])->name('ambassadeurs');
// Route::get('AmbassadeurGroupe', [ambassadeurGroupeController::class, 'show'])->name('AmbassadeurGroupe.show');
// Route::get('AmbassadeurGroupe', [ambassadeurGroupe::class, 'edit'])->name('AmbassadeurGroupe.edit');

// ambassadeurs
Route::get('/searchamb', [AmbassadeurController::class, 'searchamb'])->name('searchamb');

Route::get('ambassadeurs', [SegementController::class, 'getAllamb'])->name('ambassadeurs');
//Route::get('ambassadeurs', [AmbassadeurController::class, 'getAll'])->name('ambassadeurs');
Route::get('ambassadeurs', [AmbassadeurController::class, 'show'])->name('ambassadeurs.show');
Route::get('ambassadeurs', [AmbassadeurController::class, 'edit'])->name('ambassadeurs.edit');
//Route::get('ambassadeurs', [AmbassadeurController::class, 'index'])->name('ambassadeurs.index');
Route::get('ambassadeurs', [AmbassadeurController::class, 'destroy'])->name('ambassadeurs');
Route::get('ambassadeurs', [AmbassadeurController::class, 'index'])->name('ambassadeurs');
Route::get('ambassadeurs.groupeamb', [AmbassadeurController::class, 'groupeamb'])->name('ambassadeurs.groupeamb');

// Route::get('ambassadeurs.groupeamb/{$id_ambassadeur}', [AmbassadeurController::class, 'groupeamb'])->name('ambassadeurs.groupeamb/{$id_ambassadeur}');
// Route::get('ambassadeurs', [AmbassadeurController::class, 'index2'])->name('ambassadeurs');
// groupes
//Route::get('groupes.show', [GroupeController::class, 'delete'])->name('groupes.show');
Route::get('groupeavecambassadeurs', [GroupeavecambassadeurController::class, 'index'])->name('groupeavecambassadeurs');
Route::get('groupesansambassadeurs', [GroupeController::class, 'getAllSansAmb'])->name('groupesansambassadeurs');
Route::get('groupeavecsegmentations', [GroupeavecsegmentationController::class, 'index'])->name('groupeavecsegmentations');
//Route::get('subindex', [GroupeavecsegmentationController::class, 'subindex'])->name('subindex');

// Segment + segmentation
//Route::any('segements.update', [SegementController::class,'update'])->name('segements.update');
//Route::get('segements.edit', [SegementController::class,'edit'])->name('segements.edit');
Route::get('segements.groupeseg', [SegementController::class, 'groupeseg'])->name('segements.groupeseg');

//Route::get('groupe.show/{id}', [segementGroupeController::class, 'destroy'])->name('groupes.show');
Route::get('segements', [SegementController::class, 'getAllSegment'])->name('segements');
//Route::any('segements/{id_segment}', [SegementController::class,'show'])->name('segements');
Route::get('segements', [SegementController::class, 'store'])->name('segements');
//Route::get('groupes.show/{id}',[SegementController::class,'delete'])->name('groupes');
Route::get('segements', [SegementController::class, 'getAllSegment'])->name('segements');
Route::get('segementations', [SegementationController::class, 'getAllSegmentation'])->name('segementations');
Route::any('segementationsDelete/{id}', [SegementationController::class, 'delete'])->name('segementationsDelete');
Route::any('deleteAmbassadeur/{id}', [AmbassadeurController::class, 'deleteAmbassadeur'])->name('deleteAmbassadeur');
Route::any('deleteSegment/{id}', [SegementController::class, 'deleteSegment'])->name('deleteSegment');

//Route::any('groupes/{id}', [GroupeController::class, 'deleteSegment'])->name('groupes');
//Route::delete('groupes/{segment_groupe}',[EtudiantControllers::class,'delete'])->name('groupes.supprimer');
//Route::any('groupeDelete/{id}', [SegementationController::class, 'delete'])->name('groupeDelete');

Route::get('groupesanssegmentations', [GroupesanssegmentationController::class, 'getAllSansSegmentation'])->name('groupesanssegmentations');
//nouveau :

// Adhésion
Route::get('adhmanuelles', [AdhmanuelleController::class, 'getAll_adh'])->name('adhmanuelles');
Route::get('questionads', [QuestionadController::class, 'getAll_quad'])->name('questionads');
//Route::get('segements.show/{id_segment}', [SegementController::class,'show'])->name('segements.show');
//Route::get('segements.show/{id_segment}', [SegementController::class,'show'])->name('segements.show');

Route::get('/searchsegment', [SegementController::class, 'searchsegment'])->name('searchsegment');
Route::get('/multisearch', [GroupeController::class, 'multisearch'])->name('multisearch');
Route::get('/multisearch_sans_amb', [GroupesansambassadeurController::class, 'multisearch_sans_amb'])->name('multisearch_sans_amb');
Route::get('/multisearch_amb', [GroupeavecambassadeurController::class, 'multisearch_amb'])->name('multisearch_amb');
Route::get('/multisearch_utilisateurs', [UtilisateurController::class, 'multisearch_utilisateurs'])->name('multisearch_utilisateurs');
Route::get('/multisearch_g_s_segmentation', [GroupesanssegmentationController::class, 'multisearch_g_s_segmentation'])->name('multisearch_g_s_segmentation');
Route::get('/multisearch_g_a_segmentation', [GroupeavecsegmentationController::class, 'multisearch_g_a_segmentation'])->name('multisearch_g_a_segmentation');
Route::get('/multisearch_s_segment', [GroupesanssegmentController::class, 'multisearch_s_segment'])->name('multisearch_s_segment');
Route::get('/multisearch_adh', [AdhmanuelleController::class, 'multisearch_adh'])->name('multisearch_adh');

Route::get('/get_campagne_encours', [HomeController::class, 'get_campagne_encours'])->name('get_campagne_encours');
Route::get('/get_campagne_terminee', [HomeController::class, 'get_campagne_terminee'])->name('get_campagne_terminee');
Route::get('/get_campagne_archivee', [HomeController::class, 'get_campagne_archivee'])->name('get_campagne_archivee');
Route::get('/get_campagne_planifiee', [HomeController::class, 'get_campagne_planifiee'])->name('get_campagne_planifiee');
Route::get('/get_campagne_idee', [HomeController::class, 'get_campagne_idee'])->name('get_campagne_idee');

//Scripts
Route::get('/publiergroupe', [PubliergroupeController::class, 'index'])->name('publiergroupe');
Route::get('/partagepublications', [PartagepublicationsController::class, 'index'])->name('partagepublications');
Route::get('/cherchepublications', [CherchepublicationsController::class, 'index'])->name('cherchepublications');
Route::get('/engagements', [EngagementsController::class, 'index'])->name('engagements');
Route::get('/insightspost', [InsightpostController::class, 'index'])->name('insightspost');
Route::get('/insightspage', [InsightpageController::class, 'index'])->name('insightspage');
Route::get('/releveinfo', [ReleveinfoController::class, 'index'])->name('releveinfo');
Route::get('/adhesion', [AdhesionController::class, 'index'])->name('adhesion');
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
Route::get('/relevecentposts', [RelevecentController::class, 'index'])->name('relevecentposts');
Route::get('/recherchenouveauxgroupe', [RecherchegroupeController::class, 'index'])->name('recherchenouveauxgroupe');
Route::get('/groupesdashboard', [GroupesdashboardController::class, 'index'])->name('groupesdashboard');
Route::get('/segmentsdashboard', [SegmentsdashboardController::class, 'index'])->name('segmentsdashboard');
Route::get('/onboardgroupe', [OnboardgroupeController::class, 'index'])->name('onboardgroupe');
Route::get('/optimisationactivite', [OptimisationactiviteController::class, 'index'])->name('optimisationactivite');
Route::get('/searchuser', [UserController::class, 'searchuser'])->name('searchuser');

Route::delete('/deleteall', [UserController::class, 'deleteall'])->name('deleteall');
Route::delete('/deleteall_g', [GroupeController::class, 'deleteall_g'])->name('deleteall_g');
//Route::get('/deleteseg/{id_segmentation}', [App\Http\Controllers\SegementationController::class, 'deleteseg'])->name('deleteseg');
//new route
// Route::get('segementations.show/{id_segmentation}',[App\Http\Controllers\SegementationController::class,'show'])->name('segementations.show');
Route::get('delete/{id}', [SegementationController::class, 'delete'])->name('delete');
Route::get('delete/{id}', [AmbassadeurController::class, 'delete'])->name('delete');

// Route::get('segementations.groupeseg', [SegementationController::class, 'showgrpseg'])->name('segementations.showgrpseg');
//Route::delete('destroy', [App\Http\Controllers\GroupeController::class, 'destroy'])->name('groupes.destroy');

// Route::get('groupecampagnes.index', [GroupecampagneController::class, 'index'])->name('groupecampagnes.index');
// Route::post('groupecampagnes.index', [GroupecampagneController::class, 'update'])->name('groupecampagnes.update');

Route::post('/recup/{ids}', 'App\Http\Controllers\GroupecampagneController@recup');
Route::post('/mettre-a-jour-statut', 'App\Http\Controllers\GroupecampagneController@mettreAJourStatut');

Route::post('/ajax/request', 'AjaxController@sendRequest');
Route::post('/ajaxupdate/{ids}', 'App\Http\Controllers\GroupecampagneController@ajaxupdate');

Route::get('groupecampagnes?{id_campagne?}', [GroupecampagneController::class, 'index'])->name('redirection');

Route::get('/supprimer/{id?}/{id_campagne?}', 'App\Http\Controllers\GroupecampagneController@supprimer')->name('groupe.delete');


use App\Http\Controllers\DashboardrequalificationgroupeController;

Route::get('/dashboardrequalificationgroupe', [DashboardrequalificationgroupeController::class, 'index'])->name('dashboardrequalificationgroupe');

//Dossier Contact
Route::get('/contacts.create', [ContactController::class, 'create'])->name('contacts.create');
Route::get('/contacts.show', [ContactController::class, 'show'])->name('contacts.show');
Route::get('/contacts.edit', [ContactController::class, 'edit'])->name('contacts.edit');
Route::get('/contacts.update', [ContactController::class, 'update'])->name('contacts.update');
Route::get('/contacts.store', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts.index', [ContactController::class, 'index'])->name('contacts.index');
Route::delete('/contacts.destroy', [ContactController::class, 'destroy'])->name('contacts.destroy');

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationclientController;

//Dossier Client
Route::get('/clients.create', [ClientController::class, 'create'])->name('clients.create');
Route::get('/clients.show', [ClientController::class, 'show'])->name('clients.show');
Route::get('/clients.edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::get('/clients.update', [ClientController::class, 'update'])->name('clients.update');
Route::get('/clients.index', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients.index', [ClientController::class, 'index'])->name('clients.index');
Route::delete('/clients.destroy', [ClientController::class, 'destroy'])->name('clients.destroy');

//Reservation client
Route::get('/reservationclient.create', [ReservationclientController::class, 'create'])->name('reservationclient.create');
Route::get('/reservationclient.validate', [ReservationclientController::class, 'valid'])->name('reservationclient.validate');
Route::get('/reservationclient.show', [ReservationclientController::class, 'show'])->name('reservationclient.show');
Route::get('/reservationclient.edit', [ReservationclientController::class, 'edit'])->name('reservationclient.edit');
Route::post('/reservationclient.store', [ReservationclientController::class, 'store'])->name('reservationclient.store');
Route::get('/reservationclient.update', [ReservationclientController::class, 'update'])->name('reservationclient.update');
Route::get('/reservationclient.index', [ReservationclientController::class, 'store'])->name('reservationclient.store');
Route::get('/reservationclient.index', [ReservationclientController::class, 'index'])->name('reservationclient.index');
Route::delete('/reservationclient.destroy', [ReservationclientController::class, 'destroy'])->name('reservationclient.destroy');

use App\Http\Controllers\NotifController;
Route::get('/notif.index', [NotifController::class, 'index'])->name('notif.index');

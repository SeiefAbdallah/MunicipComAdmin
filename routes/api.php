<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Voyager\ActualitesController;
use App\Http\Controllers\Voyager\EvenementsController;
use App\Http\Controllers\Voyager\CirconscriptionsController;
use App\Http\Controllers\Voyager\CommitesController;
use App\Http\Controllers\Voyager\DossiersController;
use App\Http\Controllers\Voyager\TypeAutorisationsController;
use App\Http\Controllers\Voyager\MembreExterieuresController;
use App\Http\Controllers\Voyager\ProjetsController;
use App\Http\Controllers\Voyager\VotesController;
use App\Http\Controllers\Voyager\CommentairesController;
use App\Http\Controllers\Voyager\SeancesPlinieresController;
use App\Http\Controllers\Voyager\PartenariatsController;
use App\Http\Controllers\Voyager\DecriptifJuridiquesController;
use App\Http\Controllers\Voyager\FormulaireController;
use App\Http\Controllers\Voyager\FromInputController;
use App\Http\Controllers\Voyager\InputsController;
use App\Http\Controllers\Voyager\ListesController;
use App\Http\Controllers\Voyager\MessagesController;
use App\Http\Controllers\Voyager\ModelsController;
use App\Http\Controllers\Voyager\MontantsController;
use App\Http\Controllers\Voyager\ReponsesController;
use App\Http\Controllers\Voyager\ReunionsController;
use App\Http\Controllers\Voyager\TentativeController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\changePassword;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\Voyager\FileController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Authentication API
Route::group([
    'middleware' => 'api'
], function ($router) {

    /**
     * Authentication Module
     */
    Route::group(['prefix' => 'auth'], function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('forgot', [ForgetPasswordController::class, 'forgot']);
        Route::post('reset', [ForgetPasswordController::class, 'reset']);
        Route::get('profile',[AuthController::class,'profile']);
        Route::post('updateprofile',[AuthController::class,'update_profile'])->middleware('auth:sanctum');
        Route::post('change', [changePassword::class, 'change'])->middleware('auth:sanctum');

        //Route::put('edit-profile',[AuthController::class,'profile_edit']);
    });
});


Route::post('/sendMail', [SendMailController::class, 'mail']);





//************NEWS*************/
//show all news
Route::get('/actualites', [ActualitesController::class, 'index']);

//show one news
    Route::get('/actualite/{id}', [ActualitesController::class, 'show']);




// ********Events*************

// show all events
Route::get('/evenements', [EvenementsController::class, 'index']);

//show one event
Route::get('/evenements/{id}', [EvenementsController::class, 'show']);


// **********album***********
// show all album
Route::get('/album', [\App\Http\Controllers\voyager\AlbumController::class, 'index']);

// **********users***********
// show all users
Route::get('/users', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);


// **********Circonscriptions***********
// show all Circonscriptions
Route::get('/circonscriptions', [CirconscriptionsController::class, 'index']);

//show one Circonscriptions
Route::get('/circonscriptions/{id}', [CirconscriptionsController::class, 'show']);




// **********Commites***********

// show all Commites
Route::get('/commites', [CommitesController::class, 'index']);

//show one Commites
Route::get('/commites/{id}', [CommitesController::class, 'show']);


// **********Dossiers***********

// show all Dossiers
Route::get('/dossiers', [DossiersController::class, 'index'])->middleware();

//show one Dossiers
Route::get('/dossiers/{id}', [DossiersController::class, 'show']);



// **********Decisions***********

// show all Decisions
Route::get('/decisions', [DossiersController::class, 'index'])->middleware();

//show one Decision
Route::get('/decisions/{id}', [DossiersController::class, 'show']);



// **********type autorisations***********

// show all types
Route::get('/type_autorisations', [TypeAutorisationsController::class, 'index'])->middleware();

//show one type
Route::get('/type_autorisation/{id}', [TypeAutorisationsController::class, 'show']);


// **********Membre-exterieures***********

// show all types
Route::get('/Membre-exterieures', [MembreExterieuresController::class, 'index']);

//show one type
Route::get('/Membre-exterieures/{id}', [MembreExterieuresController::class, 'show']);

// **********Projets***********

// show all types
Route::get('/projets', [ProjetsController::class, 'index'])->middleware();

//show one type
Route::get('/projets/{id}', [ProjetsController::class, 'show']);

// **********Votes***********

// show all types
Route::get('/votes', [VotesController::class, 'index'])->middleware();

//show one type
Route::get('/votes/{id}', [VotesController::class, 'show']);

// **********Commentaires***********

// show all Commentaires
Route::get('/commentaires', [CommentairesController::class, 'index']);

//post commentaire
Route::post('/comments/post',[CommentairesController::class,'store']);

//show one Commentaire
Route::get('/commentaires/{id}', [CommentairesController::class, 'show']);

// **********Seance Plinieres***********

// show all Commentaires
Route::get('/seances', [SeancesPlinieresController::class, 'index'])->middleware();

//show one Commentaire
Route::get('/seances/{id}', [SeancesPlinieresController::class, 'show']);

// **********Partenariats***********

// show all partenariats
Route::get('/partenariats', [PartenariatsController::class, 'index']);

//show one partenariat
Route::get('/partenariats/{id}', [PartenariatsController::class, 'show']);

// **********Descriptif Juridique***********

// show all partenariats
Route::get('/descriptifs', [DecriptifJuridiquesController::class, 'index']);

//show one partenariat
Route::get('/descriptifs/{id}', [DecriptifJuridiquesController::class, 'show']);

// **********Messages***********

// show all Messages
Route::get('/messages', [MessagesController::class, 'index']);

//show one Message
Route::get('/messages/{id}', [MessagesController::class, 'show']);

//insert messages
Route::post('/message/add',[MessagesController::class,'store']);

// **********Reunions***********

// show all Reunions
Route::get('/reunions', [ReunionsController::class, 'index'])->middleware();

//show one Reunion
Route::get('/reunions/{id}', [ReunionsController::class, 'show']);



// **********Monatnts***********

// show all Monatnts
Route::get('/montants', [MontantsController::class, 'index']);

//show one Monatnts
Route::get('/montants/{id}', [MontantsController::class, 'show']);


// **********Models design***********

// show all Monatnts
Route::get('/models', [ModelsController::class, 'index']);

//show one Monatnts
Route::get('/models/{id}', [ModelsController::class, 'show']);


// **********Listes Predefnis***********

// show all Listes
Route::get('/listes', [ListesController::class, 'index']);

//show one Listes
Route::get('/listes/{id}', [ListesController::class, 'show']);


// **********Tentatives***********

// show all Tentatives
Route::get('/tentatives', [TentativeController::class, 'index']);

//show one Tentative
Route::get('/tentatives/{id}', [TentativeController::class, 'show']);


// **********Reponses***********

// show all Reponses
Route::get('/reponses', [ReponsesController::class, 'index']);

//show one Reponse
Route::get('/reponses/{id}', [ReponsesController::class, 'show']);


// **********Form inputs***********

// show all frominputs
Route::get('/forminputs', [FromInputController::class, 'index']);

//show one frominputs
Route::get('/forminputs/{id}', [FromInputController::class, 'show']);

// **********inputs***********

// show all inputs
Route::get('/inputs', [InputsController::class, 'index']);

//show one inputs
Route::get('/inputs/{id}', [InputsController::class, 'show']);

// **********Formualaires***********

// show all formulaires
Route::get('/formulaires', [FormulaireController::class, 'index']);

//show one formulaires
Route::get('/formulaires/{id}', [FormulaireController::class, 'show']);

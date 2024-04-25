<?php

use App\Http\Controllers\Api\OutletController;
use App\Http\Controllers\MessageController;
use App\Models\Tag;
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

Route::get('/send-message', [MessageController::class, 'sendMessages']);
Route::get('/whatsapp-webhook', [MessageController::class, 'verifyWebhook']);
Route::post('/whatsapp-webhook', [MessageController::class, 'processWebhook']);
Route::apiResources([
    'messages' => MessageController::class,
]);
Route::get('/message-templates', [MessageController::class, 'loadMessageTemplates']);
Route::post('/send-message-templates', [MessageController::class, 'sendMessageTemplate']);
Route::get('/get-users', [MessageController::class, 'getUsers']);

Route::get('/tags', function(Request $request){
    
    $term = $request->term ?? '';

    $tags = Tag::select('name')
        ->where('name', 'LIKE', '%' . $term . '%')
        ->limit(10)
        ->get()->map(function($tag){
            
            return [
                'id' => $tag->name,
                'text' => $tag->name,
            ];

        });

    return $tags;

})->name('api.tags.index');


Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
    /*
     * Outlets Endpoints
     */
    Route::get('outlets', [OutletController::class, 'index'])->name('outlets.index');
});

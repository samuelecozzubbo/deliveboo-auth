<?php

use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Admin\SaleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// sulla home ci servono tutte le tipologie
Route::get('/types', [ApiController::class, 'types']);

// tutti i ristoranti filtrati o no, da mandare sulla home in ordine alfabetico, per filtrarli aggiunge la query types=1,2,3...
Route::get('/restaurants', [ApiController::class, 'restaurants']);

// singolo ristorante
Route::get('restaurant/{restaurant:slug}', [ApiController::class, 'restaurant']);

// tutti i prodotti del ristorante selezionato
Route::get('/restaurant/{restaurant:slug}/products', [ApiController::class, 'restaurantProducts']);

// rotta ordine
Route::get('/orders/generate', [ApiController::class, 'generate']);


// rotta pagamento
Route::post('/orders/make/payment', [ApiController::class, 'makePayment']);

// creazione ordine
Route::post('/order/create', [SaleController::class, 'store']);

//Rotta mail
Route::post('/send-email', [LeadController::class, 'store']);

//Rotta ristorante per id
Route::get('/restaurant/{id}/name', [ApiController::class, 'restaurantById']);

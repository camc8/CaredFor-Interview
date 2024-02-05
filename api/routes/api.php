<?php

use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/appointments', function () {
    return new AppointmentResource(Appointment::get(['id', 'appointment_external_id', 'appointment_date', 'timezone', 'type', 'provider_name']));
});

Route::get('/appointments/full', function () {
    return new AppointmentResource(Appointment::all());
});

Route::get('/appointments/paginate/{rows?}', function (?string $rows) {
    return new AppointmentResource(Appointment::select('id', 'appointment_external_id', 'appointment_date', 'timezone', 'type', 'provider_name')->paginate($rows));
});

Route::get('/appointments/full/paginate/{rows?}', function (?string $rows) {
    return new AppointmentResource(Appointment::paginate($rows));
});

Route::get('/appointments/{id}', function (string $id) {
    return new AppointmentResource(Appointment::findOrFail($id));
});

// Route::get('/appointments/{id}/user', function (string $id) {
//     return new UserResource(User::findOrFail($id));
// });

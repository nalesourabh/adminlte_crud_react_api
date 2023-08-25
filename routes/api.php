<?php

use App\Http\Controllers\Admin\UnitController;
use App\Models\tbl_unit;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//  Unit Route
Route::get("/admin/unit/index", [UnitController::class, 'index']);
Route::get("/admin/unit/trash_index", [UnitController::class, 'trash_index']);
Route::get("/admin/unit/search/{search}", [UnitController::class, 'search']);
Route::post("/admin/unit/store", [UnitController::class, 'store']);
// Route::post("/admin/unit/store", function (Request $request) {
//     // return $request;
//     $data = new tbl_unit();
//     $data->unit_name = $request->unit_name;
//     $result = $data->save();
//     if ($result) {
//         return response()->json([
//             'msg' => 'Unit Create Successfully',
//             'data' => $data,
//             'status_code' => 1
//         ]);
//     } else {
//         return response()->json([
//             'msg' => 'Warning',
//             'status_code' => 0
//         ]);
//     }
// });
Route::get("/admin/unit/edit/{id}", [UnitController::class, 'edit']);
Route::post("/admin/unit/update", [UnitController::class, 'update']);
Route::get("/admin/unit/trash/{id}", [UnitController::class, 'status']);

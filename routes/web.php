<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CarsController;
use Illuminate\Support\Facades\Route;
use OpenApi\Annotations as OA;




Auth::routes(['register' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home.index');


Route::middleware(['auth'])->group(function () {
    Route::middleware(['can:isAdmin'])->group(function () {
        /**
         * @OA\Get(
         *     path="/users/list",
         *     operationId="getUsersList",
         *     tags={"Users"},
         *     summary="Get list of users",
         *     @OA\Response(
         *         response=200,
         *         description="Successful operation",
         *         @OA\JsonContent(
         *             type="array",
         *             @OA\Items(ref="#/components/schemas/User")
         *         )
         *     )
         * )
         */
        Route::get('/users/list', [UsersController::class, 'index'])->name('users.index');

        /**
         * @OA\Get(
         *     path="/users/create",
         *     operationId="createUserForm",
         *     tags={"Users"},
         *     summary="Show the user creation form",
         *     @OA\Response(
         *         response=200,
         *         description="Successful operation"
         *     )
         * )
         */
        Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');

        /**
         * @OA\Post(
         *     path="/users",
         *     operationId="storeUser",
         *     tags={"Users"},
         *     summary="Create a new user",
         *     @OA\RequestBody(
         *         required=true,
         *         @OA\JsonContent(ref="#/components/schemas/UserRequest")
         *     ),
         *     @OA\Response(
         *         response=200,
         *         description="Successful operation"
         *     ),
         *     @OA\Response(
         *         response=500,
         *         description="Internal server error"
         *     )
         * )
         */
        Route::post('/users', [UsersController::class, 'store'])->name('users.store');

        /**
         * @OA\Delete(
         *     path="/users/{user}",
         *     operationId="deleteUser",
         *     tags={"Users"},
         *     summary="Delete a user",
         *     @OA\Parameter(
         *         name="user",
         *         in="path",
         *         description="ID of the user",
         *         required=true,
         *         @OA\Schema(
         *             type="integer"
         *         )
         *     ),
         *     @OA\Response(
         *         response=200,
         *         description="Successful operation"
         *     ),
         *     @OA\Response(
         *         response=500,
         *         description="Internal server error"
         *     )
         * )
         */
        Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');

        /**
         * @OA\Get(
         *     path="/users/{user}",
         *     operationId="editUserForm",
         *     tags={"Users"},
         *     summary="Show the user edit form",
         *     @OA\Parameter(
         *         name="user",
         *         in="path",
         *         description="ID of the user",
         *         required=true,
         *         @OA\Schema(
         *             type="integer"
         *         )
         *     ),
         *     @OA\Response(
         *         response=200,
         *         description="Successful operation",
         *         @OA\JsonContent(ref="#/components/schemas/User")
         *     ),
         *     @OA\Response(
         *         response=500,
         *         description="Internal server error"
         *     )
         * )
         */
        Route::get('/users/{user}', [UsersController::class, 'edit'])->name('users.edit');

        /**
         * @OA\Put(
         *     path="/users/{user}",
         *     operationId="updateUser",
         *     tags={"Users"},
         *     summary="Update a user",
         *     @OA\Parameter(
         *         name="user",
         *         in="path",
         *         description="ID of the user",
         *         required=true,
         *         @OA\Schema(
         *             type="integer"
         *         )
         *     ),
         *     @OA\RequestBody(
         *         required=true,
         *         @OA\JsonContent(ref="#/components/schemas/UserRequest")
         *     ),
         *     @OA\Response(
         *         response=200,
         *         description="Successful operation"
         *     ),
         *     @OA\Response(
         *         response=500,
         *         description="Internal server error"
         *     )
         * )
         */
        Route::post('/users/{user}', [UsersController::class, 'update'])->name('users.update');

        /**
         * @OA\Post(
         *     path="/roleChange/{user}",
         *     operationId="roleChangeUser",
         *     tags={"Users"},
         *     summary="Change the role of a user",
         *     @OA\Parameter(
         *         name="user",
         *         in="path",
         *         description="ID of the user",
         *         required=true,
         *         @OA\Schema(
         *             type="integer"
         *         )
         *     ),
         *     @OA\Response(
         *         response=200,
         *         description="Successful operation"
         *     ),
         *     @OA\Response(
         *         response=500,
         *         description="Internal server error"
         *     )
         * )
         */
        Route::post('/roleChange/{user}', [UsersController::class, 'roleChange'])->name('users.roleChange');
    });

    /**
     * @OA\Get(
     *     path="/cars",
     *     operationId="getCarsList",
     *     tags={"Cars"},
     *     summary="Get list of cars",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Car")
     *         )
     *     )
     * )
     */
    Route::get('/cars', [CarsController::class, 'index'])->name('cars.index');

    /**
     * @OA\Get(
     *     path="/cars/create",
     *     operationId="createCarForm",
     *     tags={"Cars"},
     *     summary="Show the car creation form",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    Route::get('/cars/create', [CarsController::class, 'create'])->name('cars.create');

    /**
     * @OA\Post(
     *     path="/cars",
     *     operationId="storeCar",
     *     tags={"Cars"},
     *     summary="Create a new car",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CarRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    Route::post('/cars', [CarsController::class, 'store'])->name('cars.store');

    /**
     * @OA\Delete(
     *     path="/cars/{car}",
     *     operationId="deleteCar",
     *     tags={"Cars"},
     *     summary="Delete a car",
     *     @OA\Parameter(
     *         name="car",
     *         in="path",
     *         description="ID of the car",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    Route::delete('/cars/{car}', [CarsController::class, 'destroy'])->name('cars.destroy');

    /**
     * @OA\Get(
     *     path="/cars/edit/{car}",
     *     operationId="editCarForm",
     *     tags={"Cars"},
     *     summary="Show the car edit form",
     *     @OA\Parameter(
     *         name="car",
     *         in="path",
     *         description="ID of the car",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Car")
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    Route::get('/cars/edit/{car}', [CarsController::class, 'edit'])->name('cars.edit');

    /**
     * @OA\Put(
     *     path="/cars/{car}",
     *     operationId="updateCar",
     *     tags={"Cars"},
     *     summary="Update a car",
     *     @OA\Parameter(
     *         name="car",
     *         in="path",
     *         description="ID of the car",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CarRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    Route::post('/cars/{car}', [CarsController::class, 'update'])->name('cars.update');

    /**
     * @OA\Get(
     *     path="/cars/{car}",
     *     operationId="showCar",
     *     tags={"Cars"},
     *     summary="Show a car",
     *     @OA\Parameter(
     *         name="car",
     *         in="path",
     *         description="ID of the car",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Car")
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    Route::get('/cars/{car}', [CarsController::class, 'show'])->name('cars.show');

    /**
     * @OA\Get(
     *     path="/search",
     *     operationId="searchCarsForm",
     *     tags={"Cars"},
     *     summary="Show the car search form",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/CarSearchForm")
     *     )
     * )
     */
    Route::get('/search', [CarsController::class, 'searchForm'])->name('cars.searchForm');
});
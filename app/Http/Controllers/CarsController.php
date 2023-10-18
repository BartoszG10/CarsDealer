<?php

namespace App\Http\Controllers;

use App\Http\Requests\carsRequest;
use App\Models\cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use \App\Enums\FuelTypes;
use OpenApi\Annotations as OA;



class CarsController extends Controller
{


    public $fuelTypes;

    public function __construct()
    {
        $this->fuelTypes = FuelTypes::TYPES;
    }

    /**
     * @OA\Get(
     *     path="/cars",
     *     operationId="getCars",
     *     tags={"Cars"},
     *     summary="Get list of cars",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index(): View
    {
        return view("cars.index", [
            'cars' => cars::paginate(15)
        ]);
    }

    /**
     * @OA\Get(
     *     path="/cars/create",
     *     operationId="createCar",
     *     tags={"Cars"},
     *     summary="Show the car creation form",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function create(): view
    {
        return view("cars.create", ['fuelTypes' => $this->fuelTypes]);
    }

    /**
     * @OA\Post(
     *     path="/cars",
     *     operationId="storeCar",
     *     tags={"Cars"},
     *     summary="Create a new car",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/carsRequest")
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
    public function store(carsRequest $request)
    {
        try {
            $car = new cars($request->validated());
            if ($request->hasFile('image_path')) {
                $car->image_path = $request->file('image_path')->store('pictures');
            }

            $car->save();

            return (redirect(route("cars.index"))->with('status', __('lang.message.success_add')));
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => __('lang.message.error'),
                'error' => $th->getMessage()
            ])->setStatusCode(500);
        }
    }

    /**
     * @OA\Get(
     *     path="/cars/{car}",
     *     operationId="showCar",
     *     tags={"Cars"},
     *     summary="Show the car details",
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
     *     )
     * )
     */
    public function show(cars $car)
    {
        return View('cars.show', [
            'car' => $car,
            'fuelTypes' => $this->fuelTypes
        ]);
    }

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
     *         description="Successful operation"
     *     )
     * )
     */
    public function edit(cars $car)
    {
        return view("cars.edit", [
            'car' => $car,
            'fuelTypes' => $this->fuelTypes
        ]);
    }

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
     *         @OA\JsonContent(ref="#/components/schemas/carsRequest")
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
    public function update(carsRequest $request, cars $car)
    {
        try {
            $oldImagePath = $car->image_path;

            $car->fill($request->validated());
            if ($request->hasFile('image_path')) {
                if (Storage::exists($oldImagePath)) {
                    Storage::delete($oldImagePath);
                }
                $car->image_path = $request->file('image_path')->store('pictures');
            }
            $car->save();
            return (redirect(route("cars.index"))->with('status', __('lang.message.success_edit')));
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => __('lang.message.error'),
                'error' => $th->getMessage(),
            ])->setStatusCode(500);
        }
    }

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
    public function destroy(cars $car): JsonResponse
    {
        try {
            $car->delete();
            session()->flash('status', __('lang.message.success_delete'));
            return response()->json([
                'status' => 'success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => __('lang.message.error'),
                'error' => $th->getMessage()
            ])->setStatusCode(500);
        }
    }

    /**
     * @OA\Post(
     *     path="/search",
     *     operationId="searchCars",
     *     tags={"Cars"},
     *     summary="Search for cars",
     *     @OA\RequestBody(
     *         required=false,
     *         @OA\JsonContent(ref="#/components/schemas/SearchCarsRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     * * @OA\Schema(
     *     schema="SearchCarsRequest",
     *     title="Search Cars Request",
     *     description="Request schema for searching cars",
     *     @OA\Property(property="name", type="string"),
     *     @OA\Property(property="model", type="string"),
     *     @OA\Property(property="fuelType", type="string"),
     *     @OA\Property(property="yearOfProduction", type="integer"),
     *     @OA\Property(property="transmission", type="string"),
     *     @OA\Property(property="driveType", type="string"),
     *     @OA\Property(property="price_min", type="number"),
     *     @OA\Property(property="price_max", type="number"),
     * )
     */
    public function searchForm(Request $request)
    {
        if ($request) {
            $name = $request->input('name');
            $model = $request->input('model');
            $fuelType = $request->input('fuelType');
            $yearOfProduction = $request->input('yearOfProduction');
            $transmission = $request->input('transmission');
            $driveType = $request->input('driveType');
            $price_min = $request->input('price_min');
            $price_max = $request->input('price_max');

            $query = Cars::query();

            if ($name) {
                $query = $query->where('name', 'LIKE', "%$name%");
            }

            if ($model) {
                $query = $query->where('model', 'LIKE', "%$model%");
            }

            if ($fuelType) {
                $query = $query->where('fuelType', '=', $fuelType);
            }

            if ($yearOfProduction) {
                $query = $query->where('yearOfProduction', '=', $yearOfProduction);
            }

            if ($transmission) {
                $query = $query->where('transmission', '=', $transmission);
            }

            if ($driveType) {
                $query = $query->where('driveType', '=', $driveType);
            }

            if ($price_min) {
                $query = $query->where('price', '>=', $price_min);
            }

            if ($price_max) {
                $query = $query->where('price', '<=', $price_max);
            }

            $results = $query->get()->map(function ($result) {
                $result->fuelTypeTranslated = __('lang.enums.fuelType.' . $result->fuelType);
                return $result;
            });
        }

        return $request->expectsJson()
            ? response()->json(['data' => $results])
            : view('cars.searchForm', ['fuelTypes' => $this->fuelTypes, 'cars' => Cars::all()]);
    }
}
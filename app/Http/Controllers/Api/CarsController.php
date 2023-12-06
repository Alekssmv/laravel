<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\CarsServiceApiContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarApiRequest;
use Exception;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoriesRepositoryContract;
use App\Transformers\TransformApiCars;
use App\Http\Resources\CarResource;


class CarsController extends Controller
{

    public function __construct(
        private readonly CarsServiceApiContract $carsServiceApi,
        private readonly CategoriesRepositoryContract $categoriesRepository,
        private readonly TransformApiCars $transformApiCars
    ) {
        $this->middleware('shield');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $cars = $this->carsServiceApi->get();
            return CarResource::collection($cars)->additional([
                'success' => true,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarApiRequest $request)
    {
        try {
            $car = $this->carsServiceApi->create($request->validated());
            return response()->json([
                'success' => true,
                'car_id' => $car->id,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CarApiRequest $request, $id)
    {
        try {
            $car = $this->carsServiceApi->getById($id);
            $this->carsServiceApi->update($request->validated(), $car);
            return response()->json([
                'success' => true,
                'car_id' => $car->id,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $car = $this->carsServiceApi->getById($id);
            $this->carsServiceApi->delete($car);
            return response()->json([
                'success' => true,
                'car_id' => $id,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}

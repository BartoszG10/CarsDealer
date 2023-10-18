<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      title="Cars Request",
 *      description="Request body for creating or updating a car",
 *      @OA\Property(
 *          property="name",
 *          type="string",
 *          description="The name of the car",
 *          example="Toyota"
 *      ),
 *      @OA\Property(
 *          property="model",
 *          type="string",
 *          description="The model of the car",
 *          example="Camry"
 *      ),
 *      @OA\Property(
 *          property="fuelType",
 *          type="string",
 *          description="The type of fuel used by the car",
 *          example="Gasoline"
 *      ),
 *      @OA\Property(
 *          property="yearOfProduction",
 *          type="integer",
 *          description="The year of production of the car",
 *          example=2022
 *      ),
 *      @OA\Property(
 *          property="transmission",
 *          type="string",
 *          description="The type of transmission of the car",
 *          example="Automatic"
 *      ),
 *      @OA\Property(
 *          property="driveType",
 *          type="string",
 *          description="The type of drive of the car",
 *          example="AWD"
 *      ),
 *      @OA\Property(
 *          property="addInfo",
 *          type="string",
 *          description="Additional information about the car",
 *          example="Great condition, low mileage"
 *      ),
 *      @OA\Property(
 *          property="image_path",
 *          type="string",
 *          format="binary",
 *          description="Image of the car",
 *      ),
 *      @OA\Property(
 *          property="price",
 *          type="number",
 *          format="float",
 *          description="The price of the car",
 *          example=25000.99
 *      ),
 * )
 */

class carsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:40',
            'model' => 'required|max:40',
            'fuelType' => 'required|max:20',
            'yearOfProduction' => 'required|integer|min:' . (date('Y') - 100) . '|max:' . date("Y"),
            'transmission' => 'required',
            'driveType' => 'required',
            'addInfo' => 'nullable',
            'image_path' => 'nullable|image|mimes:jpg,png',
            'price' => 'required|numeric|min:0|max:1000000',
        ];
    }
}
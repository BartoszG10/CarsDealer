<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Cars",
 *     title="Cars Model",
 *     description="Cars model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID of the car"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Name of the car"
 *     ),
 *     @OA\Property(
 *         property="model",
 *         type="string",
 *         description="Model of the car"
 *     ),
 *     @OA\Property(
 *         property="fuelType",
 *         type="string",
 *         enum={"Petrol","LPG", "Diesel", "Electric"},
 *         description="Fuel type of the car"
 *     ),
 *     @OA\Property(
 *         property="yearOfProduction",
 *         type="integer",
 *         description="Year of production of the car"
 *     ),
 *     @OA\Property(
 *         property="transmission",
 *         type="string",
 *         description="Transmission type of the car"
 *     ),
 *     @OA\Property(
 *         property="driveType",
 *         type="string",
 *         description="Drive type of the car"
 *     ),
 *     @OA\Property(
 *         property="addInfo",
 *         type="string",
 *         description="Additional information about the car"
 *     ),
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         format="float",
 *         description="Price of the car"
 *     )
 * )
 */
class cars extends Model
{
    use HasFactory;

    protected $table = "cars";

    public $timestamps = false;
    protected $fillable = [
        'name',
        'model',
        'fuelType',
        'yearOfProduction',
        'transmission',
        'driveType',
        'addInfo',
        'price'
    ];
}
<?php


namespace App\Http\Controllers;


use App\Models\cars;
use OpenApi\Annotations as OA;


/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         title="CarDealer CRUD",
 *         version="1.0.0",
 *         description="API documentation for the CarDealer CRUD application.",
 *         @OA\License(
 *             name="MIT License",
 *             url="https://opensource.org/licenses/MIT"
 *         ),
 *     ),
 *     security={
 *         {"bearerAuth": {}}
 *     },
 *     @OA\Tag(
 *         name="Users",
 *         description="Endpoints related to managing users"
 *     ),
 *     @OA\Tag(
 *         name="Cars",
 *         description="Endpoints related to managing cars"
 *     ),
 * )
 */


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     *
     * @OA\Get(
     *     path="/",
     *     operationId="getHome",
     *     tags={"Home"},
     *     summary="Get home page with cars list for carousel",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     )
     * )
     */
    public function index()
    {
        return view('home', [
            'cars' => cars::all()
        ]);
    }
}
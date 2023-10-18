<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;

use OpenApi\Annotations as OA;



class UsersController extends Controller
{
    /**
     * Display a paginated list of users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Session\SessionManager  $sessionManager
     * @return \Illuminate\Contracts\Support\Renderable
     *
     * @OA\Get(
     *     path="/users/list",
     *     operationId="getUsers",
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
    public function index(Request $request, SessionManager $sessionManager)
    {
        return view("users/index", [
            'users' => User::paginate(15)
        ]);
    }

    /**
     * Show the user creation form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     *
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
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \App\Http\Requests\userRequest  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *     path="/users",
     *     operationId="storeUser",
     *     tags={"Users"},
     *     summary="Create a new user",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/userRequest")
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

    public function store(userRequest $request)
    {
        try {
            $user = new User($request->validated());
            $user->password = Hash::make($request->password);
            $user->save();
            return (redirect(route("users.index"))->with('status', __('lang.message.success_add')));
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => __('lang.message.error'),
                'error' => $th->getMessage()
            ])->setStatusCode(500);
        }
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     *
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
    public function destroy(User $user): JsonResponse
    {
        try {
            $user->delete();
            session()->flash('status', __('lang.message.success_delete'));
            return response()->json([
                'status' => 'success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => __('lang.message.error')
            ])->setStatusCode(500);
        }
    }

    /**
     * Show the user edit form.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     *
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
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \App\Http\Requests\userRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     *
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
     *         @OA\JsonContent(ref="#/components/schemas/userRequest")
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


    public function update(userRequest $request, User $user)
    {
        $oldPassword = $user->password;
        try {
            $user->fill($request->validated());
            if (!is_null($request->password)) {
                $user->fill([
                    'password' => Hash::make($request->password)
                ]);
            } else {
                $user->fill([
                    'password' => $oldPassword
                ]);
            }
            $user->save();
            return (redirect(route("users.index"))->with('status', __('lang.message.success_edit')));
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => __('lang.message.error'),
                $th
            ])->setStatusCode(500);
        }
    }

    /**
     * Change the role of the specified user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *     path="/roleChange",
     *     operationId="roleChangeUser",
     *     tags={"Users"},
     *     summary="Change the role of a user",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RoleChangeRequest")
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
     * @OA\Schema(
     *     schema="RoleChangeRequest",
     *     title="Role Change Request",
     *     description="Request schema for changing user role",
     *     @OA\Property(
     *         property="role",
     *         type="string",
     *         enum={"admin", "user"},
     *         description="User role. Possible values: admin, user."
     *     ),
     * )
     *
     */
    public function roleChange(Request $request)
    {
        $id = $request->id;
        try {
            $user = User::find($id);

            if ($user) {
                $user->role = (($user->role == 'user') ? 'admin' : 'user');
                $user->save();
            }
            session()->flash('status', __('lang.message.success_role_change'));
            return response()->json([
                'status' => 'success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => __('lang.message.error'),
                'error' => $th->getMessage(),
            ])->setStatusCode(500);
        }
    }
}
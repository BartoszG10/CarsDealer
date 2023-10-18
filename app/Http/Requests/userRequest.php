<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      title="User Request",
 *      description="Request body for creating or updating a user",
 *      @OA\Property(
 *          property="name",
 *          type="string",
 *          description="The name of the user",
 *          example="John Doe"
 *      ),
 *      @OA\Property(
 *          property="email",
 *          type="string",
 *          description="The email address of the user",
 *          example="johndoe@example.com"
 *      ),
 *      @OA\Property(
 *          property="password",
 *          type="string",
 *          description="The password of the user",
 *          example="password123"
 *      ),
 *      @OA\Property(
 *          property="password_confirmation",
 *          type="string",
 *          description="Confirmation of the user's password",
 *          example="password123"
 *      ),
 * )
 */
class userRequest extends FormRequest
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
            'name' => 'required|max:20',
            'email' => 'required|unique:users,email,' . (($this->user) ? $this->user->id : ''),
            'password' => 'min:8|max:15|string|' . (($this->user) ? 'nullable' : 'required||confirmed'),
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => __('lang.message.emailExist')
        ];
    }
}
<?php

namespace App\Support\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *   schema="UserStoreRequest",
 *   description="Create new user",
 *   required={"name", "email", "password"},
 *   @OA\Property(
 *      property="name",
 *      type="string",
 *      example="Write Name",
 *      description="User name",
 *      minLength=1,
 *      maxLength=191,
 *   ),
 *   @OA\Property(
 *      property="nickname",
 *      type="string",
 *      example="Write Nickname",
 *      minLength=1,
 *      maxLength=30,
 *      description="User nickname",
 *      example="JD",
 *   ),
 *   @OA\Property(
 *      property="email",
 *      type="string",
 *      minLength=1,
 *      maxLength=191,
 *      description="User email",
 *      example="new_email@email.com",
 *   ),
 *   @OA\Property(
 *      property="password",
 *      type="string",
 *      minLength=1,
 *      maxLength=191,
 *      description="User Password",
 *      example="write Password",
 *   ),
 * )
 */
class UserStoreRequest extends FormRequest
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
            'name'     => 'required|string|max:191|min:1',
            'email'    => 'required|email|unique:users',
            'nickname'    => 'required|string|min:2|max:30|unique:users',
            'password' => 'required|string|min:8|max:191',
        ];
    }
}

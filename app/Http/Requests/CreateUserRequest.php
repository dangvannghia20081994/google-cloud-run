<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      required={"name", "email", "password"},
 *      properties={
 *          @OA\Property(property="name", type="string", example="huunv"),
 *          @OA\Property(property="email", type="string", example="huunv@gmail.com"),
 *          @OA\Property(property="password", type="string", example="123456"),
 *      }
 * )
 */
class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ];
    }
}

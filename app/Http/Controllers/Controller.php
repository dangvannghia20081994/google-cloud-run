<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;

/**
 * @OA\Info(
 *     version="1.0",
 *     title="Example for response examples value"
 * )
 */
/**
 * @OA\Info(
 *      version="1.0.",
 *      title="Laravel Api Documentation",
 *      description="L5 Swagger",
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Demo API Server"
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Register User
     *
     * @OA\Post(
     *      path="/api/v1/register",
     *      tags={"Auth"},
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *              ref="#/components/schemas/CreateUserRequest"
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/AuthResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     * @param Request $request
     * @return AuthResource
     */
    public function createUser(Request $request): AuthResource
    {
        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return new AuthResource($user);
    }
}

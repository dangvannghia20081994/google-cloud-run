<?php

namespace App\Http\Resources;

/**
 * @OA\Schema(
 *      properties={
 *          @OA\Property(
 *              property="success",
 *              type="boolean",
 *              example="true"
 *          ),
 *          @OA\Property(
 *              property="data",
 *              type="object",
 *                  @OA\Property(property="token", type="string", example="3|PXX3pewsSBbtJhJQXXuRZ1NiLHzTvD6Bv2TBUJjm"),
 *                  @OA\Property(property="token_type", type="string", example="Bearer"),
 *          ),
 *          @OA\Property(
 *              property="message",
 *              type="string",
 *              example="success"
 *          )
 *      }
 * )
 */
class AuthResource extends SuccessResource
{
    /**
     * @return array
     */
    public function toData(): array
    {
        return [
            'token' => $this->createToken("api")->plainTextToken,
            'token_type' => 'Bearer',
        ];
    }
}

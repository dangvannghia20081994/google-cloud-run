<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccessResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(\Illuminate\Http\Request $request): array
    {
        return [
            'data' => $this->toData(),
            'success' => true,
            'message' => 'message',
        ];
    }
}

<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

/**
 * Interface IndexResponseInterface
 * @package App\Http\Responses
 */
interface IndexResponseInterface extends Responsable
{
    /**
     * @return array
     */
    public function createResponseData(): array;
}

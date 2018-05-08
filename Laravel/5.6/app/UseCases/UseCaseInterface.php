<?php

namespace App\UseCases;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface UseCaseInterface
 * @package App\UseCases
 */
interface UseCaseInterface
{
    /**
     * @param Model $model
     * @return mixed
     */
    public function run(Model $model);
}

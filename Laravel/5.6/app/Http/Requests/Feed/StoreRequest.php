<?php
declare(strict_types=1);

namespace App\Http\Requests\Feed;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreRequest
 * @package App\Http\Requests\Feed
 */
class StoreRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}

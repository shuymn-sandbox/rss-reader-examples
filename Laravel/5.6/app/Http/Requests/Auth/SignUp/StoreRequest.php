<?php
declare(strict_types=1);

namespace App\Http\Requests\Auth\SignUp;

use App\Rules\UserNameRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreRequest
 * @package App\Http\Requests\Auth\SignUp
 */
class StoreRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'max:31', 'unique:users', new UserNameRule],
            'nickname' => 'required|string|max:31',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}

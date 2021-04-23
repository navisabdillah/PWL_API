<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

abstract class ApiRequest extends FormRequest
{
    use ApiResponse;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function rules();

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->apiError(
        $validator->errors(),
        Response::HTTP_UNPROCESSABLE_ENTITY,
        ));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function failedAuthorization()
    {
        throw new HttpResponseException($this->apiError(
            null,
            Response::HTTP_UNAUTHORIZED
        ));
    }
}

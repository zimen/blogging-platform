<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class PostRequest extends FormRequest
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
            'title' =>'required',
            'description'=> 'required'
        ];
    }
    
    
    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator) {
        if ($this->ajax() || $this->wantsJson() || $this->segment(1) == 'api') {
            // Get Errors
            $errors = (new ValidationException($validator))->errors();

            // Get Json
            $json = [
                'success' => false,
                'message' => 'An error occurred while validating the data.',
                'data' => $errors,
            ];


            throw new HttpResponseException(response()->json($json, JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
        }

        parent::failedValidation($validator);
    }
}

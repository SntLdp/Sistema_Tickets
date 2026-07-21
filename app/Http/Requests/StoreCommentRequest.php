<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // la autorización de "quién puede comentar" se valida en el controlador vía policy
    }

    public function rules(): array
    {
        return [
            'body' => ['required', 'string', 'max:3000'],
            'is_internal' => ['sometimes', 'boolean'],
        ];
    }
}

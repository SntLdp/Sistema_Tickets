<?php

namespace App\Http\Requests;

use App\Enums\TicketPriority;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->isUser();
    }

    public function rules(): array
    {
        return [
            'department' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:10', 'max:5000'],
            'priority' => ['required', new Enum(TicketPriority::class)],
        ];
    }

    public function messages(): array
    {
        return [
            'description.required' => 'Describe el problema que estás presentando.',
            'description.min' => 'La descripción debe tener al menos 10 caracteres.',
            'priority.required' => 'Selecciona una prioridad para tu solicitud.',
        ];
    }
}

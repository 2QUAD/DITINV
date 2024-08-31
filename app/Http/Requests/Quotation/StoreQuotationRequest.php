<?php

namespace App\Http\Requests\Quotation;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuotationRequest extends FormRequest
{
    /**
     * Determine se o usuário está autorizado a fazer esta solicitação.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtém as regras de validação que se aplicam à solicitação.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required|numeric|exists:customers,id',
            'reference' => 'required|string|max:255',
            'tax_percentage' => 'required|integer|min:0|max:100',
            'discount_percentage' => 'required|integer|min:0|max:100',
            'shipping_amount' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
            'note' => 'nullable|string|max:1000',
        ];
    }

    /**
     * Obtém as mensagens de erro personalizadas para a validação.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'customer_id.required' => 'O campo cliente é obrigatório.',
            'customer_id.numeric' => 'O cliente deve ser um número válido.',
            'customer_id.exists' => 'O cliente selecionado não existe.',
            'reference.required' => 'A referência é obrigatória.',
            'reference.string' => 'A referência deve ser uma string.',
            'reference.max' => 'A referência não pode ter mais de 255 caracteres.',
            'tax_percentage.required' => 'O percentual de imposto é obrigatório.',
            'tax_percentage.integer' => 'O percentual de imposto deve ser um número inteiro.',
            'tax_percentage.min' => 'O percentual de imposto não pode ser menor que 0.',
            'tax_percentage.max' => 'O percentual de imposto não pode ser maior que 100.',
            'discount_percentage.required' => 'O percentual de desconto é obrigatório.',
            'discount_percentage.integer' => 'O percentual de desconto deve ser um número inteiro.',
            'discount_percentage.min' => 'O percentual de desconto não pode ser menor que 0.',
            'discount_percentage.max' => 'O percentual de desconto não pode ser maior que 100.',
            'shipping_amount.required' => 'O valor do frete é obrigatório.',
            'shipping_amount.numeric' => 'O valor do frete deve ser um número.',
            'shipping_amount.min' => 'O valor do frete não pode ser negativo.',
            'total_amount.required' => 'O valor total é obrigatório.',
            'total_amount.numeric' => 'O valor total deve ser um número.',
            'total_amount.min' => 'O valor total não pode ser negativo.',
            'status.required' => 'O status é obrigatório.',
            'status.string' => 'O status deve ser uma string.',
            'status.max' => 'O status não pode ter mais de 255 caracteres.',
            'note.string' => 'A nota deve ser uma string.',
            'note.max' => 'A nota não pode ter mais de 1000 caracteres.',
        ];
    }

    /**
     * Obtém os atributos de validação com nomes mais amigáveis.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'customer_id' => 'cliente',
            'reference' => 'referência',
            'tax_percentage' => 'percentual de imposto',
            'discount_percentage' => 'percentual de desconto',
            'shipping_amount' => 'valor do frete',
            'total_amount' => 'valor total',
            'status' => 'status',
            'note' => 'nota',
        ];
    }
}

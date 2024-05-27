<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => 'required', 'max:30',
            'tanggal_transaksi' => 'required|date',
            'total_pengeluaran' => 'required|numeric|min:0',
            'metode_pembayaran' => 'nullable|string',
            'catatan' => 'nullable|string',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

use Illuminate\Validation\Rule;

class KelasReq extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        $kelasId = $this->route('kelas'); // Mendapatkan ID dari route parameter

        return [
            'nama_kelas' => ['required', Rule::unique('kelas', 'nama_kelas')->ignore($kelasId)],
            'kompetensi_keahlian' => 'required'
        ];
    }
}


<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

use Illuminate\Validation\Rule;

class SiswaReq extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        $siswa = $this->route('siswa'); // Mendapatkan ID dari route parameter

        return [
            'nisn' => ['required', Rule::unique('siswa', 'nisn')->ignore($siswa)],
            'id' => 'required'
        ];
    }
}


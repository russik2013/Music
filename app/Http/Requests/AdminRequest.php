<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'login' => 'required|string|min:3',
            'password' => 'sometimes|string|min:3'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя обязательно',
            'name.string' => 'Имя должно быть строкой',
            'name.min' => 'Имя должно содержать минимум 3 буквы (Ян - выкручивайся, Олег - радуйся, что не 5)',

            'login.required' => 'Логин обязателен',
            'login.string' => 'Логин должен быть строкой',
            'login.min' => 'Логин должен содержать минимум 3 символа (Ибо нехуй)',

            'password.required' => 'Пароль обязателен',
            'password.string' => 'Пароль должен быть строкой',
            'password.min' => 'Пароль должен содержать минимум 3 символа (Ибо нехуй)',

            'handle_album.required' => 'Обязательно установить права доступа к альбомам',
            'handle_album.boolean' => 'Права доступа к альбомам устанавливаються лобо логическое согласие, либо логическое отрицание',

            'handle_admin.required' => 'Обязательно установить права доступа к администраторам',
            'handle_admin.boolean' => 'Права доступа к администраторам устанавливаються лобо логическое согласие, либо логическое отрицание'

        ];
    }


}

<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|max:20',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '氏名は入力必須です。',
            'name.max' => '氏名は10文字以内でご入力ください。',
            'email.required' => 'メールアドレスは入力必須です。',
            'email.email' => 'メールアドレスは正しくご入力ください。',
            'password.required' => 'パスワードは必須入力です。',
            'password_confirmation.required' => 'パスワードの確認は必須です。',
            'password_confirmation.same' => 'パスワードと確認パスワードが一致しません。',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function($validator) {
            $users = User::all();

            foreach ($users as $user) {
                if ($user['email'] === $this->input('email')) {
                    $validator->errors()->add('email','メールアドレスはすでに登録されています。');
                }
            }
        });
    }
}

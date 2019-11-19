<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class DailyReportRequest extends FormRequest
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
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'reporting_time' => 'date|before_or_equal:"now"',
        ];
    }

    public function messages()
    {
        return [
            'required' => '入力必須の項目です。',
            'max' => '入力された文字が多すぎます。255文字以内入力してください。',
            'before_or_equal' => '今日までの日付を入力してください。',
            'date' => '日付を入力してください。',
        ];
    }

}

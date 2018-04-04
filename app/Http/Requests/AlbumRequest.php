<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
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
            'title' => 'required|string|min:3',
            'artist' => 'required|string|min:3',
            'image' => 'sometimes|image',
            'year_of_release' => 'sometimes|numeric|min:4',
            'tracklist' => 'sometimes|string|min:3',
            'description' => 'sometimes|string|min:3',
            'label' => 'sometimes|string|min:3',
            //'genre' => 'sometimes|string|min:3',
            'quality' => 'sometimes|string|min:3',
            'total_time' => 'sometimes|string|min:3',
            'total_size' => 'sometimes|string|min:3',
            'download_link' => 'sometimes|url',
            'category' => 'sometimes|validCategories',
            'show_in_slider' => 'required|boolean',
            'big_image' => 'sometimes|image'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название обязательно',
            'title.string' => 'Название должно быть строкой',
            'title.min' => 'Минимальная длина названия 3 символа',

            'artist.required' => 'Имя исполнитель обязателен',
            'artist.string' => 'Имя исполнителя нужно записать строкой',
            'artist.min' => 'Имя исполнителя толжно быть минимум 3 символа',

            'image.required' => 'Картинка обязательна',
            'image.image' => 'Загружать именно картинку (понимай как хочешь)',

            'year_of_release.numeric' => 'Год выпуска указывать числом',
            'year_of_release.min' => 'Камон, год выпуска альбома должно быть четырехзначным',

            'tracklist.string' => 'Треклист должен быть строкой',
            'tracklist.min' => 'Название треклиста минимум 3 символа',

            'description.string' => 'Описание должно быть строкой',
            'description.min' => 'Ну же, опиши альбом более чем тремя символами',

            'label.string' => 'Метка должна быть строкой',
            'label.min' => 'минимальное название метки 3 символа',

            'genre.string' => 'Жанр должен быть строкой',
            'genre.min' => 'Название жанра должно быть длинее трёх символов (Pop, R&B и Rap - не жанры, a херня)',

            'quality.string' => 'Качество должно быть записано строкой',
            'quality.min' => 'Качество записывается минимум тремя символами',

            'total_time.string' => 'Общее время записывается строкой',
            'total_time.min' => 'Строка записи общего времени должны быть длинеее трёх символов',

            'total_size.string' => 'Общий размер - записывать строкой',
            'total_size.min' => 'Длина строки записи общего размера должна привышать три символа',

            'download_link.url' => 'Ссылка на скачивание должна быть валидной'
        ];
    }
}

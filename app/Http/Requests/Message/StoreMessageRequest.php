<?php

namespace App\Http\Requests\Message;

use App\Models\Room;
use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()
            ->inRoom(Room::find($this->input('room_id')));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'room_id' => 'required|numeric|exists:rooms,id',
            'body' => 'required|string|min:1',
        ];
    }
}

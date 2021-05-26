<?php

namespace App\Http\Requests;

use App\Models\Type;
use App\Models\Level;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public $types_array;
    public $levels_array;

    public function __construct()
    {
        $this->types_array = Type::select('id')->get()->pluck('id')->toArray();
        $this->levels_array = Level::select('id')->get()->pluck('id')->toArray();
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'uuid' => 'required',
            'title' => 'required|min:5',
            'intro' => 'required|max:240',
            'description' => 'required|max:1000',
            'start_date' => 'required',
            'start_time' => 'required',
            'slug' => 'required',
            'creator_id' => 'required|int',
            'min_attendees' => 'nullable|numeric',
            'max_attendees' => 'nullable|numeric',
            'type_id' => 'required', Rule::in($this->types_array),
            'level_id' => 'required', Rule::in($this->levels_array),
            'location' => 'nullable',
            'url' => 'nullable',
            'leader_led' => 'required|bool',
            'gender' => 'required', Rule::in(['mixed', 'ladies', 'gents']),
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'uuid' => (string) Str::uuid(),
            'slug' => Str::slug($this->title . " " . $this->start_date),
            'creator_id' => auth()->id(),
        ]);
    }
}

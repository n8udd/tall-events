<?php

namespace App\Http\Livewire\Events\traits;

trait QueryString
{
    public $level = 'all';
    public $type = 'all';
    public $search = '';
    public $leaderLed;
    public $me = FALSE;
    public $gender = NULL;

    public function queryStringUpdated(array $array)
    {
        $this->emit('pageReset');

        $key = $array["key"];
        $value = $array["value"];
        $this->$key = $value;
    }
}

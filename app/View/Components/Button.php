<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $name;
    public $type;
    public $id;
    public $class;

    public function __construct($name, $type = 'submit', $id = '', $class = 'btn-primary')
    {
        $this->name = $name;
        $this->type = $type;
        $this->id = $id;
        $this->class = $class;
    }

    public function render()
    {
        return view('components.button');
    }
}

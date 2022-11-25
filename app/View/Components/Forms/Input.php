<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $label;
    public $type;
    public $id;
    public $class;
    public $placeholder;
    public $value;

    public function __construct(
        $name,
        $label = '',
        $type = 'text',
        $id = '',
        $class = '',
        $placeholder = '',
        $value = ''
    ) {
        $_name = str_replace('_', ' ', str()->title($name));

        $this->name = $name;
        $this->label = empty($label) ? $_name : $label;
        $this->type = $type;
        $this->id = $id;
        $this->class = $class;
        $this->placeholder = empty($placeholder) ? $_name : $placeholder;
        $this->value = empty($value) ? old($name) : $value;
    }

    public function render()
    {
        return view('components.forms.input');
    }
}

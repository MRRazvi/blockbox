<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Dropdown extends Component
{
    public $name;
    public $options;
    public $label;
    public $id;
    public $class;
    public $value;

    public function __construct(
        $name,
        $options,
        $label = '',
        $id = '',
        $class = '',
        $value = ''
    ) {
        $this->name = $name;
        $this->options = $options;
        $this->label = empty($label) ? str_replace('_', ' ', str()->title($name)) : $label;
        $this->id = $id;
        $this->class = $class;
        $this->value = empty($value) ? old($name) : $value;
    }

    public function render()
    {
        return view('components.forms.dropdown');
    }
}

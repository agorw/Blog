<?php

namespace Core\HTML;

class Form
{
    private $data;

    public $surround = 'p';

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    protected function surround(string $html)
    {
        return "<{$this->surround}>$html</{$this->surround}>";
    }

    protected function getValue($index)
    {   
        if(is_object($this->data)){
        return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    public function input(string $name,string $label=null,array $option=[])
    {   
        $type = isset($option['type'])? $option['type']:'text';
        return $this->surround('<input type="'.$type.'" name="' . $name . '" value="' . $this->getValue($name) . '">');
    }

    public function submit(string $name)
    {
        return $this->surround('<button type="submit" >' . $name . '</button>');
    }
}

<?php

namespace Core\HTML;

class Form
{
    private $data;

    public $surround = 'p';

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    protected function surround($html)
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

    public function input($name,$label=null,$option=[])
    {   
        $type = isset($option['type'])? $option['type']:'text';
        return $this->surround('<input type="'.$type.'" name="' . $name . '" value="' . $this->getValue($name) . '">');
    }

    public function submit($name)
    {
        return $this->surround('<button type="submit" >' . $name . '</button>');
    }
}

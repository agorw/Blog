<?php

namespace Core\HTML;

use Core\HTML\Form;

class BootstrapForm extends Form
{

    protected function surround($html)
    {
        return "<div class=\"form-group\">$html</div>";
    }

    public function input($name, $label = null, $option = [])
    {
        $lab = ($label === null) ? $name : $label;
        $type = isset($option['type']) ? $option['type'] : 'text';

        $label = '<label>' . $lab . '</label>';

        if ($type === "textarea") {
            $input = '<textarea class="form-control" name="' . $name . '" >' . $this->getValue($name) . '</textarea>';
        } else {
            $input = '<input class="form-control" type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '">';
        }

        return $this->surround($label . $input);
    }

    public function select(string $name, string $label, array $option)
    {
        $lab = ($label === null) ? $name : $label;
        $label = '<label>' . $lab . '</label>';
        $input = '<select class="form-control" name="' . $name . '">';
        foreach ($option as $k => $v) {
            $att = ($k == $this->getValue($name)) ? 'selected' : '';
            $input .= "<option value=\"$k\" $att >$v</option>";
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }
    /**
     * @param string $name
     * @return string
     */
    public function submit($name)
    {
        return $this->surround('<button class="btn btn-primary mt-2" type="submit" >' . $name . '</button>');
    }
}

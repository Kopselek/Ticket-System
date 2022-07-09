<?php

class TextAreaInput extends BaseInput
{
    public function render(): string
    {
        return sprintf('<textarea rows="4" cols="50" name="%s", id="%s" form="%s" placeholder="%s"></textarea>', $this->name, $this->name, $this->value, $this->label);
    }
}

<?php

class MessageOutput extends HtmlElement
{
    public string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function render(): string
    {
        return sprintf('<div id = "%s"></div>', $this->id);
    }
}

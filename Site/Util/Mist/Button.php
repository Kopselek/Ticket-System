<?php
class Button extends HtmlElement
{
    public string $id;
    public string $text;

    public function __construct(string $id, string $text = '')
    {
        $this->id = $id;
        $this->text = $text;
    }

    public function render(): string
    {
        return sprintf('<button id = "%s">%s</button>', $this->id, $this->text);
    }
}

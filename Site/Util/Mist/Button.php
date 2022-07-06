<?php
class Button extends HtmlElement
{
    public string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        return sprintf('<button>%s</button>', $this->text);
    }
}

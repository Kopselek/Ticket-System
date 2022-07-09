<?php
class TextArea extends HtmlElement
{
    public string $text;
    public string $readonly;

    public function __construct(string $text = '', bool $readonly = false)
    {
        $this->text = $text;
        $readonly ? $this->readonly = 'readonly' : $this->readonly = '';
    }

    public function render(): string
    {
        return sprintf('<textarea %s>%s</textarea>', $this->readonly, $this->text);
    }
}

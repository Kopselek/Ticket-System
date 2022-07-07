<?php
class Text extends HtmlElement
{
    public TextTypes $type;
    public string $text;

    public function __construct(TextTypes $type, string $text = '')
    {
        $this->type = $type;
        $this->text = $text;
    }

    public function render(): string
    {
        return sprintf('<%s>%s</%s>', $this->type->value, $this->text, $this->type->value);
    }
}

enum TextTypes: string
{
    case p = 'p';
    case h1 = 'h1';
    case h2 = 'h2';
    case h3 = 'h3';
    case h4 = 'h4';
    case h5 = 'h5';
    case h6 = 'h6';
}

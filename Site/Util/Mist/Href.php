<?php

class Href extends HtmlElement
{
    public string $url;
    public string $text;
    public string $nextline;

    public function __construct(string $url, string $text, bool $nextline)
    {
        $this->url = $url;
        $this->text = $text;
        $nextline ? $this->nextline = "<br>" : $this->nextline = "";
    }
    public function render(): string
    {
        return sprintf('<a href="%s">%s</a>%s', $this->url, $this->text, $this->nextline);
    }
}

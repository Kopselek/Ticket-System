<?php

class Form extends HtmlElement
{
    public string $id;
    public string $action;
    public string $method;

    public function __construct(string $id = '', string $method = 'GET', string $action = '')
    {
        $this->id = $id;
        $this->action = $action;
        $this->method = $method;
    }

    /**
     * @var \HtmlElement[]
     */
    protected array $elements = [];
    public function addElement(HtmlElement $element)
    {
        $this->elements[] = $element;
    }
    public function render(): string
    {
        $content = implode(PHP_EOL, array_map(fn ($element) => $element->render(), $this->elements));
        return sprintf('<form id = "%s" action = "%s" method = "%s">%s</form>', $this->id, $this->action, $this->method, $content);
    }
}

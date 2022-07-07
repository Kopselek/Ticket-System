<?php

class Form extends HtmlElement
{
    public string $id;
    public string $action;
    public string $method;
    public string $msg;

    public function __construct(string $id = '', string $method = 'GET', string $action = '', string $msg = '')
    {
        $this->id = $id;
        $this->action = $action;
        $this->method = $method;
        $this->msg = $msg;
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
        return sprintf('<form id = "%s" action = "%s" method = "%s">%s</form> <div id="%s"></div>', $this->id, $this->action, $this->method, $content, $this->msg);
    }
}

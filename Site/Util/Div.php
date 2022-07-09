<?php

class Div extends HtmlElement
{
    public string $class;

    public function __construct(string $class = '')
    {
        $this->class = $class;
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
        return sprintf('<div class = "%s">%s</div>', $this->class, $content);
    }
}

<?php

abstract class BaseSite
{
    /**
     * @var \Form[]
     */
    protected array $forms;

    public function __construct()
    {
        $this->create();
    }

    abstract public function create();

    public function render_site(): string
    {
        return implode(PHP_EOL, array_map(fn ($form) => $form->render(), $this->forms));
    }
}

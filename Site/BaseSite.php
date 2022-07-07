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
    abstract public function render_site(): string;
}

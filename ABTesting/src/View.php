<?php

declare(strict_types=1);

namespace ExadsPlus;

class View
{
    /** @var array<string, mixed> */
    private array  $vars = [];
    private string $template;


    public function __construct(string $template)
    {
        $this->template = $template;
    }


    /**
     * @param string $name
     * @param mixed $value
     *
     * @return void
     */
    public function __set(string $name, $value): void
    {
        $this->vars[$name] = $value;
    }


    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->vars[$name];
    }


    /**
     * @return string|false
     */
    public function render()
    {
        ob_start();
        extract($this->vars);
        require_once $this->template . '.phtml';

        $buffer = ob_get_contents();
        ob_end_clean();

        return $buffer;
    }


    public function createSubView(string $subTemplate): self
    {
        return new self($subTemplate);
    }
}

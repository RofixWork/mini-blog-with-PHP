<?php

namespace App;

class View
{
    public function __construct(protected string $view, protected array $params = [])
    {
    }

    /**
     * @throws ViewNotFoundException
     */
    private function render() : string|ViewNotFoundException
    {
        try {
            $viewPath = VIEW_PATH . "/$this->view.php";

            if(!file_exists($viewPath))
            {
                throw new ViewNotFoundException($this->view);
            }
            ob_start();
            include $viewPath;
            return ob_get_clean();

        } catch (ViewNotFoundException $exception)
        {
            throw new ViewNotFoundException($exception->getView(), $exception->getMessage());
        }
    }

    public static function make(string $view, array $params = []) : static
    {
        return new static($view, $params);
    }

    /**
     * @throws ViewNotFoundException
     */
    public function __toString(): string
    {
        return $this->render();
    }

    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }
}
<?php

namespace App;

class ViewNotFoundException extends \Exception
{

    public function __construct(protected string $view, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = "This View [$this->view] not exist [404]";
    }

    /**
     * @return string
     */
    public function getView(): string
    {
        return $this->view;
    }
}
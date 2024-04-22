<?php

namespace App\Exceptions;

class RouteNotFoundException extends \Exception
{
    protected $message;

    public function __construct(protected string $route, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = "This Route [$route] not found (404)";
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

}
<?php

namespace App;
/**
 * @property-read db
 */
class Config
{
    protected array $configurations = [];
    public function __construct(array $env)
    {
        $this->configurations = [
            'db' => [
                'driver' => $env['DB_DRIVER'],
                'host' => $env['DB_HOST'],
                'database' => $env['DB_DATABASE'],
                'username' => $env['DB_USERNAME'],
                'password' => $env['DB_PASSWORD'],
                'charset' => $env['DB_CHARSET'],
                'collation' => $env['DB_COLLATION'],
                'prefix' => '',
            ]
        ];
    }

    public function __get(string $name)
    {
        return $this->configurations[$name] ?? null;
    }
}
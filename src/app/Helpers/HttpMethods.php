<?php

namespace App\Helpers;

enum HttpMethods : string
{
    case GET = 'get';
    case POST = 'post';
}
<?php

namespace domain\Facades;

use domain\Services\TodoService;
use Illuminate\Support\Facades\Facade;


class TodoFacade extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return TodoService::class;
    }
}
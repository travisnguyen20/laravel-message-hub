<?php
/**
 * This file is part of TravisNguyen\MessageHub package.
 *
 * (c) Travis Nguyen <travisnguyen.me@gmail.com> <www.travisnguyen.me>
 */

namespace TravisNguyen\MessageHub\Facades;

use Illuminate\Support\Facades\Facade;

class MessageHub extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'message.hub';
    }
}

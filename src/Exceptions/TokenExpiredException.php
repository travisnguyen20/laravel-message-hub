<?php
/**
 * This file is part of TravisNguyen\MessageHub package.
 *
 * (c) Travis Nguyen <travisnguyen.me@gmail.com> <www.travisnguyen.me>
 */

namespace TravisNguyen\MessageHub\Exceptions;

use Exception;

class TokenExpiredException extends Exception
{
    /**
     * The exception description.
     *
     * @var string
     */
    protected $message = 'Token is expired, go to message-hub and grab new one';
}
<?php
/**
 * This file is part of TravisNguyen\MessageHub package.
 *
 * (c) Travis Nguyen <travisnguyen.me@gmail.com> <www.travisnguyen.me>
 */
namespace TravisNguyen\MessageHub\Exceptions;

use Exception;

class InvalidMessageException extends Exception
{
    /**
     * The exception description.
     *
     * @var string
     */
    protected $message = 'Invalid message';
}
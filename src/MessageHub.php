<?php
/**
 * This file is part of TravisNguyen\MessageHub package.
 *
 * (c) Travis Nguyen <travisnguyen.me@gmail.com> <www.travisnguyen.me>
 */
namespace TravisNguyen\MessageHub;

use TravisNguyen\MessageHub\Exceptions\InvalidAccessTokenException;
use TravisNguyen\MessageHub\Exceptions\InvalidMessageException;
use TravisNguyen\MessageHub\Exceptions\TokenExpiredException;
use GuzzleHttp\Client;

class MessageHub
{
    /*
     * Http client
     * @var Client
     */
    protected $httpClient;

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->httpClient = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://message-hub.com/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
    }

    /**
     * Push message to Message Hub
     *
     * @param Message $message
     * @return bool
     * @throws InvalidAccessTokenException
     * @throws InvalidMessageException
     * @throws TokenExpiredException
     */
    public function push(Message $message)
    {
        if (!$this->validateMessage($message)) {
            throw new InvalidMessageException();
        }

        $token = config('message-hub.api-token');

        if (!$token || $token == '') {
            throw new InvalidAccessTokenException();
        }

        $response = $this->httpClient->request('POST', 'api/message', [
            'headers' => [
                'Accept'     => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ],
            'json' => $message
        ]);

        $status = $response->getStatusCode();

        if ($status == 401) {
            throw new TokenExpiredException();
        }

        $body = $response->getBody();
        $returnMessage = \GuzzleHttp\json_decode($body);

        return $returnMessage;
    }

    /**
     * Validate message
     * true if all fields valid
     *
     * @param $message
     * @return bool
     */
    protected function validateMessage(Message $message)
    {
        return !$this->isNullOrEmpty($message->title)
            && !$this->isNullOrEmpty($message->source)
            && !$this->isNullOrEmpty($message->content);
    }

    /**
     * Check if string is null or empty
     *
     * @param $value
     * @return bool
     */
    private function isNullOrEmpty($value) {
        return $value == null || $value == '';
    }
}

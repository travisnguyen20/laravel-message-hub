<?php
/**
 * This file is part of TravisNguyen\MessageHub package.
 *
 * (c) Travis Nguyen <travisnguyen.me@gmail.com> <www.travisnguyen.me>
 */
namespace TravisNguyen\MessageHub;


class Message
{
    /**
     * ID
     *
     * @var string
     */
    public $id;

    /**
     * Title
     *
     * @var string
     */
    public $title;

    /**
     * Email
     *
     * @var string
     */
    public $email;

    /**
     * Phone
     *
     * @var string
     */
    public $phone;

    /**
     * Source
     *
     * @var string
     */
    public $source;

    /**
     * Content
     *
     * @var string
     */
    public $content;

    public function title($title) {
        $this->title = $title;
        return $this;
    }

    public function phone($phone) {
        $this->phone = $phone;
        return $this;
    }

    public function email($email) {
        $this->email = $email;
        return $this;
    }

    public function source($source) {
        $this->source = $source;
        return $this;
    }

    public function content($content) {
        $this->content = $content;
        return $this;
    }

    public static function createMessage($title, $source) {
        $message = new Message();
        $message->title($title)->source($source);
        return $message;
    }
}
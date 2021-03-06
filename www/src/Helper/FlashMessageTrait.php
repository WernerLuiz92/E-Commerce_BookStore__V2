<?php

namespace Werner\BookStore\Helper;

trait FlashMessageTrait
{
    public function setFlashMessage(string $type, string $message, bool $autoClose = false, string $strongMessage = '', string $position = 'header')
    {
        $_SESSION['position'] = $position;
        $_SESSION['strong_message'] = $strongMessage;
        $_SESSION['message'] = $message;
        if ($autoClose === true) {
            $_SESSION['message_type'] = $type.' auto-close';

            return;
        }
        $_SESSION['message_type'] = $type;
    }
}

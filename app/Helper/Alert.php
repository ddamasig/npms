<?php
namespace CustomHelper;

class Alert {
    public $color;
    public $message;

    function __construct($color, $message)
    {
        $this->color = $color;
        $this->message = $message;
    }

}

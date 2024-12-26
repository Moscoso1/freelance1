<?php
namespace App\Session;

use Illuminate\Session\Handler\DatabaseSessionHandler;

class CustomSessionHandler extends DatabaseSessionHandler
{
    public function __construct()
    {
        // Use a random integer or timestamp for session ID
        $this->sessionId = rand(1000000000, 9999999999); // This will generate a random 10-digit integer
    }

    // You can override other methods as needed to handle session storage and retrieval.
}


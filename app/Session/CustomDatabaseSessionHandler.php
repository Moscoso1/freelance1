<?php

namespace App\Session;

use Illuminate\Session\Handler\DatabaseSessionHandler;
use Illuminate\Database\ConnectionInterface;

class CustomDatabaseSessionHandler extends DatabaseSessionHandler
{
    public function __construct(ConnectionInterface $database, $table)
    {
        parent::__construct($database, $table);
    }

    // Override the method that generates the session ID
    public function generateSessionId()
    {
        // Custom logic to generate session IDs (e.g., shorter IDs)
        return bin2hex(random_bytes(16)); // Generates a 32-character hexadecimal ID
    }
}

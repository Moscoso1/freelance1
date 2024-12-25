<?php

namespace App\Session;

use SessionHandlerInterface;
use Illuminate\Database\ConnectionInterface;

class CustomDatabaseSessionHandler implements SessionHandlerInterface
{
    protected $database;
    protected $table;

    public function __construct(ConnectionInterface $database, $table = 'sessions')
    {
        $this->database = $database;
        $this->table = $table;
    }

    public function open($savePath, $sessionName)
    {
        return true;
    }

    public function close()
    {
        return true;
    }

    public function read($sessionId)
    {
        $session = $this->database->table($this->table)
            ->where('id', $sessionId)
            ->first();

        return $session ? $session->payload : '';
    }

    public function write($sessionId, $data)
    {
        $this->database->table($this->table)->updateOrInsert(
            ['id' => $sessionId],
            ['payload' => $data, 'last_activity' => time()]
        );

        return true;
    }

    public function destroy($sessionId)
    {
        $this->database->table($this->table)
            ->where('id', $sessionId)
            ->delete();

        return true;
    }

    public function gc($maxLifetime)
    {
        $this->database->table($this->table)
            ->where('last_activity', '<', time() - $maxLifetime)
            ->delete();

        return true;
    }
}

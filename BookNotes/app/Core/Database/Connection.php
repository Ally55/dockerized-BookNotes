<?php

namespace BookNotes\Core\Database;

class Connection
{
    public $pdo;
    public function __construct(array $config) {
        try {
            $this->pdo = new \PDO(
                "mysql:dbname={$config['db']['dbname']};host={$config['db']['host']}",
                $config['db']['user'], $config['db']['password']
            );
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

}



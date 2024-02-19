<?php
namespace Core;

class DB
{
    public $connection;

    public function __construct()
    {
        $dsn = config('DB_CONNECTION');
        $dsn .= ':host=' . config('DB_HOST') . ';';
        $dsn .= 'dbname=' . config('DB_DATABASE');

        $this->connection = new \PDO($dsn, config('DB_USERNAME'), config('DB_PASSWORD'));
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    }
    public function getAll($query){
        return $this->connection->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getSingle($query){
        return $this->connection->query($query)->fetch(\PDO::FETCH_ASSOC);
    }

    public function insert(string $query, array $params): int{
        $statement = $this->connection->prepare($query);
        if (!$statement->execute($params)){
            return 0;
        }
        return $this->connection->lastInsertId();
    }

    public function update(string $query, array $params): bool{
        return $this->action($query, $params);
    }

    public function delete(string $query, array $params): bool{
        return $this->action($query, $params);
    }

    private function action(string $query, array $params): bool{
        $statement = $this->connection->prepare($query);
        foreach ($params as $paramkey => $param){
            if (is_int($param)){
                $statement->bindParam($paramkey, $param,\PDO::PARAM_INT);
            }else{
                $statement->bindParam($paramkey, $param);
            }
        }
        return $statement->execute();
    }
}
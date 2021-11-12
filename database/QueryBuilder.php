<?php
    require_once __DIR__ .'/../exceptions/QueryException.php';
    require_once "./database/Connection.php";

    $connection = Connection::make();
    

    class QueryBuilder {
        private $connection;

        public function __construct($connection) {
            $this->connection = $connection;
        }

        public function findAll(string $table, string $classEntity) {
            $sql = "SELECT * FROM $table";

            try {
                $pdoStatement = $this->connection->prepare($sql);
                $pdoStatement->execute();
                $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $classEntity);
                return $pdoStatement->fetchAll();
            } catch (\PDOException $pdoe) {
                throw new QueryException("No se jha podido ejecutar la consulta solicitada: ".$pdoe->getMessage());
            }
            
        }
        
    }

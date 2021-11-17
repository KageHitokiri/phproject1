<?php
    require_once __DIR__ .'/../exceptions/QueryException.php';
    require_once __DIR__ ."/Connection.php";
    require_once __DIR__ .'/../core/App.php';

    class QueryBuilder {
        private $connection;
        private $table;
        private $classEntity;

        public function __construct(string $table, string $classEntity) {
            $this->connection = App::get('connection');
            $this->table = $table;
            $this->classEntity = $classEntity;
        }

        public function findAll() {
            $sql = "SELECT * FROM $this->table";

            try {
                $pdoStatement = $this->connection->prepare($sql);
                $pdoStatement->execute();
                $pdoStatement->setFetchMode(PDO::FETCH_CLASS |PDO::FETCH_PROPS_LATE, $this->classEntity);
                return $pdoStatement->fetchAll();
            } catch (\PDOException $pdoe) {
                throw new QueryException("No se jha podido ejecutar la consulta solicitada: ".$pdoe->getMessage());
            }                            
        }

        public function save(Entity $entity) {
            try {
                $params = $entity->toArray();
                $sql = sprintf(
                    'INSERT INTO %s (%s) values (%s)',
                    $this->table,
                    implode(', ', array_keys($params)),
                    ':'.implode(', :', array_keys($params))
                );

                $statement = $this->connection->prepare($sql);
                $statement->execute($params);

            } catch (\PDOException $pdoe) {
                throw new QueryException("Error al insertar en la base de datos: ".$pdoe->getMessage());
            }
        }
        
    }

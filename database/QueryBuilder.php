<?php
    require_once __DIR__ .'/../exceptions/QueryException.php';
    require_once __DIR__ ."/Connection.php";
    require_once __DIR__ .'/../core/App.php';


    abstract class QueryBuilder {
        protected $connection;
        protected $table;
        protected $classEntity;

        public function __construct(string $table, string $classEntity) {
            $this->connection = App::get('connection');
            $this->table = $table;
            $this->classEntity = $classEntity;
        }

        public function extractQuery(string $sql) {
            try {
                $pdoStatement = $this->connection->prepare($sql);
                $pdoStatement->execute();
                $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $this->classEntity);

                return $pdoStatement->fetchAll();
            } catch (\PDOException $pdoe) {
                throw new QueryException('No se ha podido ejecutar la consulta solicitada:' . $pdoe->getMessage());
            }
        }

        public function findAll() {
            $sql = "SELECT * FROM $this->table";
            return $this->extractQuery($sql);                         
        }

        public function findById(int $id){
            $sql = "SELECT * FROM $this->table WHERE id = $id";
            $result = $this->extractQuery($sql);

            if (empty($result)) {
                throw new NotFoundException("No se ha encontrado ningún elemento con el id $id");
            }
            return $result[0];
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

        public function executeTransaction(callable $fnExecuteQuerys) {
            try {
                $this->connection->beginTransaction();
                $fnExecuteQuerys();
                $this->connection->commit();
            } catch (\PDOException $pdoe) {
                $this->connection->rollBack();
                throw new QueryException("No se ha podido realizar la operación: ".$pdoe->getMessage());                
            }
        }
        
        private function getUpdates(array $params): string {
            $updates = "";
            
            foreach ($params as $key => $value) {
                if ($key !== 'id') {
                    if($updates !== '') {
                        $updates .=", ";
                    }
                    $updates .=$key."=:".$key;
                }
            }

            return $updates;
        }

        public function update(Entity $entity) {
            try {
                $params = $entity->toArray();
                $sql = sprintf(
                    'UPDATE %s SET %s WHERE id =:id',
                    $this->table,
                    $this->getUpdates($params)                    
                );               
                
                $statement = $this->connection->prepare($sql);
                $statement->execute($params);
                
            } catch (\PDOException $pdoe) {
                throw new QueryException("Error al actualizar el elemento con id {$params['id']}: ".$pdoe->getMessage());                
            }
        }



    }

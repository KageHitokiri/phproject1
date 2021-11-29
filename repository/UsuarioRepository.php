<?php

    require_once __DIR__ .'/../entity/Usuario.php';
    require_once __DIR__ .'/../database/QueryBuilder.php';

    class UsuarioRepository extends QueryBuilder {
        public function __construct()
        {
            parent::__construct('users','Usuario');
        }

        public function findByUserNameAndPassword(string $username,string $password):?Usuario{
            $sql = "SELECT * FROM $this->table WHERE username = :username AND password = :password";
            $params = ['username' => $username,
                        'password' => $password];
            
                try {
                    echo $sql;
                    $pdoStatement = $this->connection->prepare($sql);
                    $pdoStatement->execute($params);
                    $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $this->classEntity);
                    $result = $pdoStatement->fetchAll();
                    if (empty($result)) {
                        throw new NotFoundException("No se ha encontrado ningún usuario con esas credenciales");
                    }
                    return $result[0];
                } catch (\PDOException $pdoe) {
                    throw new QueryException("No se ha podido ejecutar la consulta solicitada" .$pdoe->getMessage());
                }         
            return null;
        }
    }


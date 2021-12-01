<?php

    require_once __DIR__ .'/../entity/Usuario.php';
    require_once __DIR__ .'/../database/QueryBuilder.php';
    require_once __DIR__ .'/../security/Argon2PasswordGenerator.php';

    

    class UsuarioRepository extends QueryBuilder {

        private $passwordGenerator;    

        public function __construct(Argon2PasswordGenerator $passwordGenerator)
        {
            $this->passwordGenerator = $passwordGenerator;
            parent::__construct('users','Usuario');
        }

        public function findByUserNameAndPassword(string $username,string $password):?Usuario{
            $sql = "SELECT * FROM $this->table WHERE username = :username";
            $params = ['username' => $username];

                try {
                    echo $sql;
                    $pdoStatement = $this->connection->prepare($sql);
                    $pdoStatement->execute($params);
                    $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $this->classEntity);
                    $result = $pdoStatement->fetch();

                    if (empty($result)) {
                        throw new NotFoundException("No se ha encontrado ningún usuario con esas credenciales");
                    } else {
                        if (!$this->passwordGenerator::passwordVerify($password, $result->getPassword())) {
                            throw new NotFoundException("No se ha encontrado ningún elemento con dichas credenciales");
                        }
                    }                                        
                } catch (\PDOException $pdoe) {
                    throw new QueryException("No se ha podido ejecutar la consulta solicitada" .$pdoe->getMessage());
                }         
            return $result;
        }

        public function save(Entity $entity) {
            $params = $entity->toArray();
            $entity->setPassword($this->passwordGenerator::encrypt($params["password"]));
            parent::save($entity);                
        }
    }


<?php

    require_once __DIR__ .'/Entity.php';
    class Categoria extends Entity {
        private $id;
        private $nombre;
        private $numImagenes;

        public function __construct(string $nombre = "", int $numImagenes = 0) {
            
            $this->id=null;
            $this->nombre=$nombre;
            $this->numImagenes=$numImagenes;
        }
        
        public function getId(){
            return $this->id;
        }

        public function setId($id) {
            $this->id=$id;
            return $this;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre=$nombre;
            return $this;
        }

        public function getNumImagenes(){
            return $this->numImagenes;
        }

        public function setNumImagenes($numImagenes) {
            $this->numImagenes=$numImagenes;
            return $this;
        }


        public function toArray():array{
            return [
                'id' => $this->getId(),
                'nombre' => $this->getNombre(),
                'numImagenes'  => $this->getNumImagenes()
            ];
        }
    }
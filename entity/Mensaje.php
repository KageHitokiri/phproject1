<?php

use function PHPSTORM_META\map;

require_once __DIR__ .'/Entity.php';

class Mensaje extends Entity
{
    
    /**
     * Undocumented variable
     *
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apellido;
    
    /**
     * @var string
     */
    private $correo;

    /**
     * @var string
     */
    private $asunto;
    
    /**
     * @var string
     */
    private $mensaje;    

    public function __construct(string $nombre = '', string $apellido = '',
                                string $correo="", string $asunto = "", string $mensaje = "")
                                {
        $this->id=null;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->asunto = $asunto;
        $this->mensaje = $mensaje;        
    }
    
    public function getId():?int{
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of nombre
     *
     * @return  string
     */ 
    public function getNombre():string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @param  string  $nombre
     *
     * @return  self
     */ 
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellido():string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido)
    {
        $this->apellido = $apellido;
        return $this;
    }

    public function getCorreo():string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo)
    {
        $this->correo = $correo;
        return $this;
    }

    public function getAsunto():string
    {
        return $this->asunto;
    }

    public function setAsunto(string $asunto)
    {
        $this->asunto = $asunto;
        return $this;
    }
    
    public function getMensaje():string
    {
        return $this->mensaje;
    }

    public function setMensaje(string $mensaje)
    {
        $this->mensaje = $mensaje;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'apellidos' => $this->getApellido(),
            'email' => $this->getCorreo(),
            'asunto' => $this->getAsunto(),
            'texto' => $this->getMensaje(),            
        ];
    }
}

<?php
require_once __DIR__ ."/../exceptions/FileException.php";
require_once __DIR__ ."/utils.php";

class File {
    /**
     * Undocumented variable
     *
     * @var string
     */
    private $file;

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $fileName;

    /**
     * Undocumented function
     *
     * @param string $fileInput
     * @param array $mimeTypes
     * @param integer $maxSize
     * @throws FileException
     */
    private function __construct(string $fileInput,
                                array $mimeTypes = [],
                                int $maxSize = 0) {
        $this->file = ($_FILES[$fileInput] ?? "");

        if (empty($this->file)) {
            throw new FileException("Se ha producido un error al procesar el formulario.");            
        }

        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            switch ($this->file['error']) {
                case UPLOAD_ERR_NO_FILE:
                    throw new FileException("Debe seleccionarse un fichero.");
                    break;
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new FileException("El fichero es demasiado grande.");
                    break;
                case UPLOAD_ERR_PARTIAL:
                    throw new FileException("No ha sido posible subir el archivo por completo.");
                    break;
                default:
                    throw new FileException("No ha sido posible subir el archivo.");
            }
        }

        if (false === in_array($this->file['type'],$mimeTypes)) {
            throw new FileException("Tipo de archivo incorrecto");            
        }

        if (($maxSize > 0) && ($this->file['size'] > $maxSize)) {
            throw new FileException("Eñl archivo es demasiado pesado, no puede superar los $maxSize bytes");
        }

        $this->fileName = sanitizeInput($this->file["name"]);
    }

    /**
     * Devuelve el nombre del fichero creado
     *
     * @return string
     */
    public function getFileName(): string {
        return $this->fileName;
    }

    /**
     * Guarda en $destPath el fichero $this.fileName
     *
     * @param string $destPath
     * @throws FileException
     */    
     public function saveUploadedFile(string $destPath) {
        if (false === is_uploaded_file($this->file["tmp_name"])) {
            throw new FileException("El archivo no ha sido subido desde el formulario pertinente");
        }

        $path = $destPath.$this->getFileName();

        if (true === is_file($path)) {
            $uniqueId = time();            
            $this->fileName = $uniqueId."_".$this->getFileName;
            $path = $destPath . $this->getFileName;
        }

        if (false === move_uploaded_file($this->file['tmp_name'],$path)) {
            throw new FileException("No se puede mover el fichero a su destino");
        }
    }
}
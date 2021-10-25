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
        //constructor
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
        // todo
    }
}
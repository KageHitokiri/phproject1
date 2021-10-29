<?php

class Associated {
    
    const PATH_IMAGE_ASSOCIATED ="images/index/";
    

    public function getUrlPortfolio(): string {
        return self::PATH_IMAGE_ASSOCIATED.$this->getName();
    }

    public function getUrlGallery(){
        return self::PATH_IMAGE_ASSOCIATED.$this->getName();
    }


    /**
     * @var [string]
     */
    private $name;
    /**
     * @var [string]
     */
    private $description;
    /**
     * @var [string]
     */
    private $logo;        

    public function __construct(string $name, 
                                string $description,
                                string $logo)
    {
        $this->name = $name;
        $this->description = $description;
        $this->logo = $logo;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
    /**
     * Get the value of numVisualizations
     */ 
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }
}

?>
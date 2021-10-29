<?php

class ImageGallery {
    
    const PATH_IMAGE_PORTFOLIO ="images/index/portfolio/";
    const PATH_IMAGE_GALLERY = "images/index/gallery/";    

    public function getUrlPortfolio(): string {
        return self::PATH_IMAGE_PORTFOLIO.$this->getName();
    }

    public function getUrlGallery(){
        return self::PATH_IMAGE_GALLERY.$this->getName();
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
     * @var [int]
     */
    private $numVisualizations;
    /**
     * @var [int]
     */
    private $numLikes;
    /**
     * @var [int]
     */
    private $numDownloads;

    public function __construct(string $name, 
                                string $description,
                                int $numVisualizations = 0,
                                int $numLikes = 0,
                                int $numDownloads = 0)
    {
        $this->name = $name;
        $this->description = $description;
        $this->numVisualizations = $numVisualizations;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
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
    public function getNumVisualizations()
    {
        return $this->numVisualizations;
    }

    /**
     * Set the value of numVisualizations
     *
     * @return  self
     */ 
    public function setNumVisualizations($numVisualizations)
    {
        $this->numVisualizations = $numVisualizations;

        return $this;
    }

    /**
     * Get the value of numLikes
     */ 
    public function getNumLikes()
    {
        return $this->numLikes;
    }

    /**
     * Set the value of numLikes
     *
     * @return  self
     */ 
    public function setNumLikes($numLikes)
    {
        $this->numLikes = $numLikes;

        return $this;
    }

    /**
     * Get the value of numDownloads
     */ 
    public function getNumDownloads()
    {
        return $this->numDownloads;
    }

    /**
     * Set the value of numDownloads
     *
     * @return  self
     */ 
    public function setNumDownloads($numDownloads)
    {
        $this->numDownloads = $numDownloads;

        return $this;
    }
}

?>
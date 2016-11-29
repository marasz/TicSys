<?php

class Artist
{
    private $name;
    private $descrition;
    private $picture;
    private $thumbnail;
    private $videos;

    /**
     * Artist constructor.
     * @param string $name
     * @param string $descrition
     * @param string $picturePath
     * @param string $thumbnailPath
     */
    public function __construct(string $name, string $descrition, string $picturePath, string $thumbnailPath)
    {
        $this->name = $name;
        $this->descrition = $descrition;
        $this->picture = $picturePath;
        $this->thumbnail = $thumbnailPath;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription() : string
    {
        return $this->descrition;
    }

    /**
     * @return string
     */
    public function getPicturePath() : string
    {
        return $this->picture;
    }

    /**
     * @return string
     */
    public function getThumbnailPath() : string
    {
        return $this->thumbnail;
    }




}
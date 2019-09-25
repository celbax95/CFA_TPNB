<?php


namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class AddAnnoucement
{
    /**
     * @Assert\NotNull()
     * @var
     */
    public $title;

    /**
     * @Assert\NotNull()
     * @var
     */
    public $price;

    /**
     * @Assert\NotNull()
     * @var
     */
    public $content;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }
}
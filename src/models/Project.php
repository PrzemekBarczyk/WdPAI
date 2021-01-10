<?php


class Project
{
    private $title;
    private $description;
    private $category;
    private $date;
    private $location;
    private $userId;
    private $image;
    private $id;

    public function __construct(string $title,
                                string $description,
                                string $category,
                                $date,
                                string $location,
                                int $userId,
                                string $image,
                                $id = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->date = $date;
        $this->location = $location;
        $this->userId = $userId;
        $this->image = $image;
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category)
    {
        $this->category = $category;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location)
    {
        $this->location = $location;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(string $userId)
    {
        $this->userId = $userId;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}
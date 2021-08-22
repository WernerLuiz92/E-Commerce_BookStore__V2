<?php

namespace Werner\BookStore\Model\Entity;

use JsonSerializable;

/**
 * @Entity
 * @Table(name="course")
 */
class Course implements JsonSerializable
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;
    /**
     * @Column(type="string")
     */
    private string $description;

    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
        ];
    }
}
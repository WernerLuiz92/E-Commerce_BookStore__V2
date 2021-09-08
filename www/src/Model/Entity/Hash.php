<?php

namespace Werner\BookStore\Model\Entity;

use JsonSerializable;

/**
 * @Entity
 * @Table(name="hashes")
 */
class Hash implements JsonSerializable
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
    private string $hash;

    public function __construct(string $hash)
    {
        $this->hash = base64_encode(trim($hash));
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getHash(): string
    {
        return base64_decode($this->hash);
    }

    public function setHash(string $hash): void
    {
        $this->hash = base64_encode(trim($hash));
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'hash' => base64_decode($this->hash),
        ];
    }
}

<?php

namespace Domain\Module\User\View\Entity;

use Illuminate\Contracts\Support\Arrayable;

final readonly class UserEntity implements Arrayable
{
    public function __construct(
        private string $id,
        private string $name,
        private string $email,
    ) {  
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
        ];
    }
}

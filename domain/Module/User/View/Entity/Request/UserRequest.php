<?php

namespace Domain\Module\User\View\Entity\Request;

final readonly class UserRequest
{
    public function __construct(
        private string $id,
    ) {  
    }

    public function getId(): string
    {
        return $this->id;
    }
}

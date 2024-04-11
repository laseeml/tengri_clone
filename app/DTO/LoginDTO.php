<?php

namespace App\DTO;

final readonly class LoginDTO
{
    public function __construct(
        public string $email,
        public string $password
    ) {
    }
}

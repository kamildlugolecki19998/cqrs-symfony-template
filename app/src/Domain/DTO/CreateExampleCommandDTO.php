<?php

namespace App\Domain\DTO;

class CreateExampleCommandDTO
{

    public function __construct(
        public readonly string $name,
        public readonly string $uuid = '',
         )
    {
    }
}

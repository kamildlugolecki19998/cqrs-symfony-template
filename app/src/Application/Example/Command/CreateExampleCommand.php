<?php

namespace App\Application\Example\Command;

use App\Infrastructure\Command\Command;

final class CreateExampleCommand implements Command
{
    public string $uuid = '';

    public function __construct(
        public string $_uuid,
        public readonly string $name
    ) {
        $this->uuid = uniqid($_uuid);
    }
}

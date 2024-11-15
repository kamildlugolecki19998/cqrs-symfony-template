<?php

namespace App\Infrastructure\Command;

interface CommandBus
{
    public function dispatch(Command $command): void;
}

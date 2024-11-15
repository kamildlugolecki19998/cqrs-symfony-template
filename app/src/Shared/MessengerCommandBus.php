<?php

namespace App\Shared;

use App\Infrastructure\Command\Command;
use App\Infrastructure\Command\CommandBus;
use Symfony\Component\Messenger\MessageBusInterface;

final class MessengerCommandBus implements CommandBus
{

    public function __construct(private MessageBusInterface $commandBus)
    {
        
    }
    
    public function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}

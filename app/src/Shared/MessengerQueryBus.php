<?php

namespace App\Shared;

use App\Infrastructure\Query\Query;
use App\Infrastructure\Query\QueryBus;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class MessengerQueryBus implements QueryBus
{
    use HandleTrait {
        handle as handleQuery;
    }
    
    public function __construct(private MessageBusInterface $messageBus){}

    public function handle(Query $query): mixed
    {
        return $this->handleQuery($query);
    }
}

<?php

namespace App\Infrastructure\Query;

interface QueryBus
{
    public function handle(Query $query): mixed;
}

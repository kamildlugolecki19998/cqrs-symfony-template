<?php

namespace App\Application\Example\Query;

use App\Infrastructure\Query\Query;

class GetExampleByNameQuery implements Query
{
    public function __construct(
        public readonly string $name
    ){}
}

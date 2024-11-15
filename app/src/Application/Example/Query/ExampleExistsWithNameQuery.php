<?php

namespace App\Application\Example\Query;

use App\Infrastructure\Query\Query;

final class ExampleExistsWithNameQuery implements Query
{
       public function  __construct(public readonly string $name)
       {
        
       }

}

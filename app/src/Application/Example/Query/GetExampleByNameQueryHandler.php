<?php

namespace App\Application\Example\Query;

use App\Infrastructure\Query\QueryHandler;
use App\Repository\Domain\Entity\ExampleRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler()]
class GetExampleByNameQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly ExampleRepository $exampleRepository
    )
    {

    }

    public function __invoke(GetExampleByNameQuery $query)
    {
        print_r($query->name);
       $example =  $this->exampleRepository->findOneBy(['name' => $query->name]);   
       print_r($example);

       return $example;
       
    }
}

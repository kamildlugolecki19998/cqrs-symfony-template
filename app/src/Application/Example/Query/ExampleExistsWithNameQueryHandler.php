<?php

namespace App\Application\Example\Query;

use App\Infrastructure\Query\QueryHandler;
use App\Repository\Domain\Entity\ExampleRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

// #[AsMessageHandler()]
class ExampleExistsWithNameQueryHandler implements QueryHandler
{
        public function __construct(private ExampleRepository $exampleRepository)
        {
            
        }

        public function __invoke(ExampleExistsWithNameQuery $query)
        {
            $example = $this->exampleRepository->findOneBy(['name' => $query->name]);

            return $example !== null;
        }
}

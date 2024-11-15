<?php

namespace App\UI\Controller;

use App\Application\Example\Command\CreateExampleCommand;
use App\Application\Example\Query\ExampleExistsWithNameQuery;
use App\Infrastructure\Command\CommandBus;
use App\Infrastructure\Query\QueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;

class ExampleController extends AbstractController
{

    public function __construct(
        private CommandBus $commandBus,
        private QueryBus $queryBus
    ) {}

    #[Route('/api/example/create', methods: ['POST'])]
    #[OA\Tag(name: 'Example')]
    public function __invoke(#[MapRequestPayload] CreateExampleCommand $command)
    {
        // $command = new CreateExampleCommand($createExampleCommandDTO->uuid, $createExampleCommandDTO->name);
        $this->commandBus->dispatch($command);

        return new JsonResponse('New example was created', 201);
    }
}

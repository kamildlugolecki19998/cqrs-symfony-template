<?php

namespace App\UI\Controller;

use App\Application\Example\Query\ExampleExistsWithNameQuery;
use App\Application\Example\Query\GetExampleByNameQuery;
use App\Infrastructure\Query\QueryBus;
use Doctrine\Migrations\Configuration\Migration\JsonFile;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use Symfony\Bundle\MakerBundle\Str;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;

class ExampleController2 extends AbstractController
{

    public function __construct(
        private QueryBus $queryBus
    ) {}


    #[Route('/api/example/get/name', methods: ['GET'])]
    #[OA\Tag(name: 'Example')]
    public function __invoke(#[MapQueryString()] GetExampleByNameQuery $query)
     {

        try {
            $example = $this->queryBus->handle($query);
        }catch(Exception $e){
            return new JsonResponse($e->getMessage());
        }
       
        return new JsonResponse(['name' => $example->getName()]);
     }


     #[Route('/api/example/exists', methods: ['GET'])]
     #[OA\Tag(name: 'Example')]
     public function exampleExists(#[MapQueryString()] ExampleExistsWithNameQuery $query)
     {
            $isExists = $this->queryBus->handle($query);

            return new JsonResponse(['Example Exist' => $isExists]);
     }
}

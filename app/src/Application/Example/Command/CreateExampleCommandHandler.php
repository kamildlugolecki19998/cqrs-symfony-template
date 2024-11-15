<?php

namespace App\Application\Example\Command;

use App\Domain\Entity\Example;
use App\Infrastructure\Command\CommandHandler;
use App\Repository\Domain\Entity\ExampleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class CreateExampleCommandHandler implements CommandHandler
{


    public function __construct(
        private ExampleRepository $exampleRepository,
        private EntityManagerInterface $entityManagerInterface
    )
    {

    }

    public function __invoke(CreateExampleCommand $command)
    {
        $uuid = $command->uuid;

        if($this->exampleRepository->findOneBy(['uuid' => $uuid])){
            throw new Exception("Example with uuid: $uuid has already existed");
        }
        $example = new Example();
        $example->setUuid($uuid);
        $example->setName($command->name);

        $this->entityManagerInterface->persist($example);
        $this->entityManagerInterface->flush();
    }
}

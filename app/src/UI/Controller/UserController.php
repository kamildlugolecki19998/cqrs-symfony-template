<?php

namespace App\UI\Controller;

use App\Application\User\Command\CreateUserCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use App\Domain\CreateUserDTO;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;

class UserController extends AbstractController
{

    public function __construct(private MessageBusInterface $messageBus){}

    #[Route('/api/create/user', methods: ['POST'])]
    #[OA\Tag('Create user')]
    public function createUser()
    {

        // $this->messageBus->dispatch($command);
    }
}

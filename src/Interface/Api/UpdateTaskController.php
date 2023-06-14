<?php

namespace App\Interface\Api;

use App\Domain\Model\UUID;
use App\UseCase\Command\UpdateTaskCommand;
use App\UseCase\CommandHandler\UpdateTaskCommandHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateTaskController extends AbstractController
{
    public function __construct(private readonly UpdateTaskCommandHandler $updateTaskCommandHandler)
    {
    }

    #[Route("/api/{uuid}", name: "task_update", methods: ["PUT"])]
    public function __invoke(string $uuid): JsonResponse
    {
        $updateTaskCommand = new UpdateTaskCommand(
            uuid: new UUID($uuid),
            name: "My updated task",
            description: "This is my updated task"
        );
        $this->updateTaskCommandHandler->handle($updateTaskCommand);
        return $this->json($uuid, Response::HTTP_OK);
    }
}

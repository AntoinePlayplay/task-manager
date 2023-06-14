<?php

namespace App\Interface\Api;

use App\Domain\Model\UUID;
use App\UseCase\Command\ToDoTaskCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

final class ToDoTaskController extends AbstractController
{
    public function __construct(private readonly MessageBusInterface $commandBus)
    {
    }

    #[Route("/api/{uuid}/to_do", name: "task_to_do", methods: ["PUT"])]
    public function __invoke(string $uuid): JsonResponse
    {
        $toDoTaskCommand = new ToDoTaskCommand(new UUID($uuid));
        $this->commandBus->dispatch($toDoTaskCommand);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}

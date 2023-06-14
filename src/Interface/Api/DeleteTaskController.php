<?php

namespace App\Interface\Api;

use App\Domain\Model\UUID;
use App\UseCase\Command\DeleteTaskCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

final class DeleteTaskController extends AbstractController
{
    public function __construct(private readonly MessageBusInterface $commandBus)
    {
    }

    #[Route("/api/{uuid}", name: "task_delete", methods: ["DELETE"])]
    public function __invoke(string $uuid): JsonResponse
    {
        $deleteTaskCommand = new DeleteTaskCommand(new UUID($uuid));
        $this->commandBus->dispatch($deleteTaskCommand);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Interface\Api;

use App\Domain\Model\UUID;
use App\UseCase\Command\CompleteTaskCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

final class CompleteTaskController extends AbstractController
{
    public function __construct(private readonly MessageBusInterface $commandBus)
    {
    }

    #[Route("/api/{uuid}/complete", name: "task_complete", methods: ["PUT"])]
    public function __invoke(string $uuid): JsonResponse
    {
        $completeTaskCommand = new CompleteTaskCommand(new UUID($uuid));
        $this->commandBus->dispatch($completeTaskCommand);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Interface\Api;

use App\Domain\Model\UUID;
use App\UseCase\Command\CompleteTaskCommand;
use App\UseCase\CommandHandler\CompleteTaskCommandHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompleteTaskController extends AbstractController
{
    public function __construct(private readonly CompleteTaskCommandHandler $completeTaskCommandHandler)
    {
    }

    #[Route("/api/{uuid}/complete", name: "task_complete", methods: ["PUT"])]
    public function __invoke(string $uuid): JsonResponse
    {
        $completeTaskCommand = new CompleteTaskCommand(new UUID($uuid));
        $this->completeTaskCommandHandler->handle($completeTaskCommand);
        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Interface\Api;

use App\Domain\Model\UUID;
use App\UseCase\Query\GetTaskQuery;
use App\UseCase\QueryHandler\GetTaskQueryHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetTaskController extends AbstractController
{
    public function __construct(private readonly GetTaskQueryHandler $getTaskQueryHandler)
    {
    }

    #[Route("/api/{uuid}", name: "task_detail")]
    public function __invoke(string $uuid): JsonResponse
    {
        $taskQuery = new GetTaskQuery(new UUID($uuid));
        $task = $this->getTaskQueryHandler->handle($taskQuery);
        return $this->json($task, Response::HTTP_OK);
    }
}

<?php

namespace App\Interface\Api;

use App\UseCase\QueryHandler\GetTaskListQueryHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetTaskListController extends AbstractController
{
    public function __construct(private readonly GetTaskListQueryHandler $getTaskListQueryHandler)
    {
    }

    #[Route("/api/", name: "task_list")]
    public function __invoke(): JsonResponse
    {
        $tasks = $this->getTaskListQueryHandler->handle();
        return $this->json($tasks, Response::HTTP_OK);
    }
}

<?php

namespace App\Interface\Api;

use App\Domain\Model\TaskUUID;
use App\UseCase\Query\GetTaskQuery;
use App\UseCase\QueryHandler\GetTaskQueryHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetTaskController extends AbstractController
{
    public function __construct(private readonly GetTaskQueryHandler $getTaskQueryHandler)
    {
    }

    #[Route("/{uuid}", name: "task_detail")]
    public function __invoke(string $uuid): Response
    {
        $taskQuery = new GetTaskQuery(TaskUUID::fromString($uuid));
        $task = $this->getTaskQueryHandler->handle($taskQuery);

        return $this->render('task/detail.html.twig', [
            'controller_name' => 'GetTaskController',
            'task' => $task,
        ]);
    }
}

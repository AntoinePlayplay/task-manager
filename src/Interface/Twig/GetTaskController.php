<?php

namespace App\Interface\Twig;

use App\Domain\Model\UUID;
use App\UseCase\Query\GetTaskQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Symfony\Component\Routing\Annotation\Route;

final class GetTaskController extends AbstractController
{
    public function __construct(private readonly MessageBusInterface $queryBus)
    {
    }

    #[Route("/app/{uuid}", name: "app_task_detail")]
    public function __invoke(string $uuid): Response
    {
        $taskQuery = new GetTaskQuery(new UUID($uuid));
        $task = $this->queryBus->dispatch($taskQuery);
        /** @var HandledStamp $handled */
        $handled = $task->last(HandledStamp::class);
        $taskResult = $handled->getResult();

        return $this->render('task/detail.html.twig', [
            'controller_name' => 'GetTaskController',
            'task' => $taskResult,
        ]);
    }
}

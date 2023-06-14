<?php

namespace App\Interface\Twig;

use App\UseCase\Query\GetTaskListQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Symfony\Component\Routing\Annotation\Route;

final class GetTaskListController extends AbstractController
{
    public function __construct(private readonly MessageBusInterface $queryBus)
    {
    }

    #[Route("/app", name: "app_task_list")]
    public function __invoke(): Response
    {
        $tasks = $this->queryBus->dispatch(new GetTaskListQuery());
        /** @var HandledStamp $handled */
        $handled = $tasks->last(HandledStamp::class);
        $tasksResult = $handled->getResult();

        return $this->render('task/index.html.twig', [
            'controller_name' => 'GetTaskListController',
            'tasks' => $tasksResult,
        ]);
    }
}

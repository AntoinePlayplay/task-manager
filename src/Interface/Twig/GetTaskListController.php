<?php

namespace App\Interface\Twig;

use App\UseCase\QueryHandler\GetTaskListQueryHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetTaskListController extends AbstractController
{
    public function __construct(private readonly GetTaskListQueryHandler $getTaskListQueryHandler)
    {
    }

    #[Route("/app", name: "app_task_list")]
    public function __invoke(): Response
    {
        $tasks = $this->getTaskListQueryHandler->handle();
        return $this->render('task/index.html.twig', [
            'controller_name' => 'GetTaskListController',
            'tasks' => $tasks,
        ]);
    }
}

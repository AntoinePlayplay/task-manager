<?php

namespace App\Interface\Api;

use App\Domain\Model\UUID;
use App\Interface\Dto\CreateTaskDto;
use App\UseCase\Command\CreateTaskCommand;
use Ramsey\Uuid\Uuid as RamseyUuid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

final class CreateTaskController extends AbstractController
{
    public function __construct(private readonly MessageBusInterface $commandBus)
    {
    }

    #[Route("/api/", name: "task_create", methods: ["POST"])]
    public function __invoke(#[MapRequestPayload] CreateTaskDto $createTaskDto): JsonResponse
    {
        $uuid = new UUID(RamseyUuid::uuid7()->toString());
        $newTask = new CreateTaskCommand(
            uuid: $uuid,
            name: $createTaskDto->name,
            description: $createTaskDto->description,
        );
        $this->commandBus->dispatch($newTask);

        return $this->json($uuid, Response::HTTP_CREATED);
    }
}

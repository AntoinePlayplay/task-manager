<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Model\Task;
use App\Domain\Model\UUID;
use App\Domain\Repository\TaskRepository;
use App\Infrastructure\Type\UuidType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

final readonly class DoctrineTaskRepository implements TaskRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function create(Task $task): void
    {
        $this->save($task);
    }

    public function delete(UUID $uuid): void
    {
        $task = $this->get($uuid);
        $this->entityManager->remove($task);
        $this->entityManager->flush();
    }

    /**
     * @throws NonUniqueResultException
     * @throws NoResultException
     */
    public function get(UUID $uuid): Task
    {
        $qb = $this->entityManager->createQueryBuilder();
        $qb->select('t')
            ->from(Task::class, 't')
            ->where('t.uuid = :uuid')
            ->setParameter('uuid', $uuid, UuidType::NAME);

        return $qb->getQuery()->getSingleResult();
    }

    public function list(): array
    {
        $qb = $this->entityManager->createQueryBuilder();
        $qb->select('t')
            ->from(Task::class, 't')
            ->orderBy('t.createdAt', 'DESC');

        return $qb->getQuery()->getResult();
    }

    public function save(Task $entity): void
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    public function update(Task $task): void
    {
        $this->save($task);
    }
}

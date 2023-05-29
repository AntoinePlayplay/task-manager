<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230529203416 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Initialize the task table and insert a task.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE tasks (uuid VARCHAR(36) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, completed BOOLEAN NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, completed_at DATETIME DEFAULT NULL, PRIMARY KEY(uuid))');
        $this->addSql("INSERT INTO tasks (uuid, name, description, completed, created_at) values ('0188693e-bdbf-7062-b681-d1afddef0d08', 'Use FrankenPHP 🐘', 'Create a project DDD with FrankenPHP', false, '2023-05-29T21:20:16+0000')");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE tasks');
    }
}

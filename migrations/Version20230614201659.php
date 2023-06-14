<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230614201659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Initialize the task table and insert a task.';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tasks (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, uuid CHAR(36) NOT NULL --(DC2Type:uuid)
        , name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, completed BOOLEAN NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, completed_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_50586597D17F50A6 ON tasks (uuid)');
        $this->addSql("INSERT INTO tasks (uuid, name, description, completed, created_at) values ('0188693e-bdbf-7062-b681-d1afddef0d08', 'Use FrankenPHP 🐘', 'Create a project DDD with FrankenPHP', false, '2023-05-29T21:20:16+0000')");

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE tasks');
    }
}

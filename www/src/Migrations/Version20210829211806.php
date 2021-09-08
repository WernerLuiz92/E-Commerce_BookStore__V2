<?php

declare(strict_types=1);

namespace Werner\BookStore\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210829211806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Change in the "users" table. Removed "name" field. Field "email" is now unique.';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `users` DROP `name`;');
        $this->addSql('ALTER TABLE `users` ADD UNIQUE(`email`);');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `users` ADD `name` VARCHAR(255) NOT NULL AFTER `id`;');
        $this->addSql('ALTER TABLE `users` DROP INDEX `email`;');

    }
}

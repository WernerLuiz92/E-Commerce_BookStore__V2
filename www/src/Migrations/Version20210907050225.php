<?php

declare(strict_types=1);

namespace Werner\BookStore\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210907050225 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Change in the "users" table. Added "access_level" field.';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `users` ADD `access_level` CHAR(1) NOT NULL DEFAULT "c" COMMENT "r = root, a = admin, t = team, c = costumer" AFTER `id`;');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `users` DROP `access_level`;');

    }
}

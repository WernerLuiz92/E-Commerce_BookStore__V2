<?php

declare(strict_types=1);

namespace Werner\BookStore\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210830030031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Alter table courses to hashses table and changed description(varchar(255)) field to hash(text).';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('RENAME TABLE `course` TO `hashes`;');
        $this->addSql('ALTER TABLE `hashes` CHANGE `description` `hash` TEXT NOT NULL;');
        
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('RENAME TABLE `hashes` TO `course`;');
        $this->addSql('ALTER TABLE `course` CHANGE `hash` `description` VARCHAR(255) NOT NULL;');

    }
}

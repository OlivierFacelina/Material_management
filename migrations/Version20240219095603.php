<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240219095603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE material ADD type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE material ADD CONSTRAINT FK_7CBE7595C54C8C93 FOREIGN KEY (type_id) REFERENCES material_kind (id)');
        $this->addSql('CREATE INDEX IDX_7CBE7595C54C8C93 ON material (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE material DROP FOREIGN KEY FK_7CBE7595C54C8C93');
        $this->addSql('DROP INDEX IDX_7CBE7595C54C8C93 ON material');
        $this->addSql('ALTER TABLE material DROP type_id');
    }
}

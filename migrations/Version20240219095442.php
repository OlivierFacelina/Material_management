<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240219095442 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE borrowing DROP FOREIGN KEY FK_226E589729A33219');
        $this->addSql('DROP INDEX IDX_226E589729A33219 ON borrowing');
        $this->addSql('ALTER TABLE borrowing CHANGE material_id_id material_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E5897E308AC6F FOREIGN KEY (material_id) REFERENCES material (id)');
        $this->addSql('CREATE INDEX IDX_226E5897E308AC6F ON borrowing (material_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE borrowing DROP FOREIGN KEY FK_226E5897E308AC6F');
        $this->addSql('DROP INDEX IDX_226E5897E308AC6F ON borrowing');
        $this->addSql('ALTER TABLE borrowing CHANGE material_id material_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E589729A33219 FOREIGN KEY (material_id_id) REFERENCES material (id)');
        $this->addSql('CREATE INDEX IDX_226E589729A33219 ON borrowing (material_id_id)');
    }
}

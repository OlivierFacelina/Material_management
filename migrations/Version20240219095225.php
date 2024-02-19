<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240219095225 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE material_kind (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE borrowing ADD material_id_id INT DEFAULT NULL, ADD employee_id INT DEFAULT NULL, ADD student_id INT DEFAULT NULL, ADD manage_id INT DEFAULT NULL, ADD training_program_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E589729A33219 FOREIGN KEY (material_id_id) REFERENCES material (id)');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E58978C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E5897CB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E5897F1AF8971 FOREIGN KEY (manage_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E58978406BD6C FOREIGN KEY (training_program_id) REFERENCES training_program (id)');
        $this->addSql('CREATE INDEX IDX_226E589729A33219 ON borrowing (material_id_id)');
        $this->addSql('CREATE INDEX IDX_226E58978C03F15C ON borrowing (employee_id)');
        $this->addSql('CREATE INDEX IDX_226E5897CB944F1A ON borrowing (student_id)');
        $this->addSql('CREATE INDEX IDX_226E5897F1AF8971 ON borrowing (manage_id)');
        $this->addSql('CREATE INDEX IDX_226E58978406BD6C ON borrowing (training_program_id)');
        $this->addSql('ALTER TABLE material CHANGE serial_number serial_number VARCHAR(255) NOT NULL, CHANGE tag_number tag_number VARCHAR(255) NOT NULL, CHANGE comment comment VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE material_kind');
        $this->addSql('ALTER TABLE material CHANGE serial_number serial_number INT NOT NULL, CHANGE tag_number tag_number INT NOT NULL, CHANGE comment comment LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE borrowing DROP FOREIGN KEY FK_226E589729A33219');
        $this->addSql('ALTER TABLE borrowing DROP FOREIGN KEY FK_226E58978C03F15C');
        $this->addSql('ALTER TABLE borrowing DROP FOREIGN KEY FK_226E5897CB944F1A');
        $this->addSql('ALTER TABLE borrowing DROP FOREIGN KEY FK_226E5897F1AF8971');
        $this->addSql('ALTER TABLE borrowing DROP FOREIGN KEY FK_226E58978406BD6C');
        $this->addSql('DROP INDEX IDX_226E589729A33219 ON borrowing');
        $this->addSql('DROP INDEX IDX_226E58978C03F15C ON borrowing');
        $this->addSql('DROP INDEX IDX_226E5897CB944F1A ON borrowing');
        $this->addSql('DROP INDEX IDX_226E5897F1AF8971 ON borrowing');
        $this->addSql('DROP INDEX IDX_226E58978406BD6C ON borrowing');
        $this->addSql('ALTER TABLE borrowing DROP material_id_id, DROP employee_id, DROP student_id, DROP manage_id, DROP training_program_id');
    }
}

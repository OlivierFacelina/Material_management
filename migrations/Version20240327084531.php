<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240327084531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE borrowing (id INT AUTO_INCREMENT NOT NULL, borrow_date DATETIME NOT NULL, expected_return_date DATETIME NOT NULL, actual_return_date DATETIME NOT NULL, comment LONGTEXT DEFAULT NULL, material_id INT DEFAULT NULL, employee_id INT DEFAULT NULL, student_id INT DEFAULT NULL, manage_id INT DEFAULT NULL, training_program_id INT DEFAULT NULL, INDEX IDX_226E5897E308AC6F (material_id), INDEX IDX_226E58978C03F15C (employee_id), INDEX IDX_226E5897CB944F1A (student_id), INDEX IDX_226E5897F1AF8971 (manage_id), INDEX IDX_226E58978406BD6C (training_program_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE material (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, serialnumber VARCHAR(255) NOT NULL, tagnumber VARCHAR(255) NOT NULL, comment VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, type_id INT DEFAULT NULL, INDEX IDX_7CBE7595C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE material_kind (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthdate DATETIME NOT NULL, formation_id INT DEFAULT NULL, INDEX IDX_B723AF335200282E (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE training_program (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, level INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E5897E308AC6F FOREIGN KEY (material_id) REFERENCES material (id)');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E58978C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E5897CB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E5897F1AF8971 FOREIGN KEY (manage_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E58978406BD6C FOREIGN KEY (training_program_id) REFERENCES training_program (id)');
        $this->addSql('ALTER TABLE material ADD CONSTRAINT FK_7CBE7595C54C8C93 FOREIGN KEY (type_id) REFERENCES material_kind (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF335200282E FOREIGN KEY (formation_id) REFERENCES training_program (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE borrowing DROP FOREIGN KEY FK_226E5897E308AC6F');
        $this->addSql('ALTER TABLE borrowing DROP FOREIGN KEY FK_226E58978C03F15C');
        $this->addSql('ALTER TABLE borrowing DROP FOREIGN KEY FK_226E5897CB944F1A');
        $this->addSql('ALTER TABLE borrowing DROP FOREIGN KEY FK_226E5897F1AF8971');
        $this->addSql('ALTER TABLE borrowing DROP FOREIGN KEY FK_226E58978406BD6C');
        $this->addSql('ALTER TABLE material DROP FOREIGN KEY FK_7CBE7595C54C8C93');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF335200282E');
        $this->addSql('DROP TABLE borrowing');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE material');
        $this->addSql('DROP TABLE material_kind');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE training_program');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191202110312 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE theses (id INT AUTO_INCREMENT NOT NULL, ecoles_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, accroche VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, INDEX IDX_3FABCA41D096F5D (ecoles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ecoles (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, lien VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE theses ADD CONSTRAINT FK_3FABCA41D096F5D FOREIGN KEY (ecoles_id) REFERENCES ecoles (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE theses DROP FOREIGN KEY FK_3FABCA41D096F5D');
        $this->addSql('DROP TABLE theses');
        $this->addSql('DROP TABLE ecoles');
    }
}

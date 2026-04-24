<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260424092011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dessin ADD CONSTRAINT FK_427D511860BB6FE6 FOREIGN KEY (auteur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE dessin ADD CONSTRAINT FK_427D51181F8ACB26 FOREIGN KEY (technique_id) REFERENCES technique (id)');
        $this->addSql('ALTER TABLE utilisateur DROP `admin`');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dessin DROP FOREIGN KEY FK_427D511860BB6FE6');
        $this->addSql('ALTER TABLE dessin DROP FOREIGN KEY FK_427D51181F8ACB26');
        $this->addSql('ALTER TABLE utilisateur ADD `admin` TINYINT DEFAULT NULL');
    }
}

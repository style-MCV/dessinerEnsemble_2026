<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260423065021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dessin (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(180) NOT NULL, image VARCHAR(255) NOT NULL, commentaire LONGTEXT NOT NULL, date_creation DATE NOT NULL, est_valide TINYINT NOT NULL, auteur_id INT NOT NULL, technique_id INT NOT NULL, INDEX IDX_427D511860BB6FE6 (auteur_id), INDEX IDX_427D51181F8ACB26 (technique_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE technique (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(180) NOT NULL, sous_titre VARCHAR(180) NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(50) NOT NULL, `admin` TINYINT DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE dessin ADD CONSTRAINT FK_427D511860BB6FE6 FOREIGN KEY (auteur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE dessin ADD CONSTRAINT FK_427D51181F8ACB26 FOREIGN KEY (technique_id) REFERENCES technique (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dessin DROP FOREIGN KEY FK_427D511860BB6FE6');
        $this->addSql('ALTER TABLE dessin DROP FOREIGN KEY FK_427D51181F8ACB26');
        $this->addSql('DROP TABLE dessin');
        $this->addSql('DROP TABLE technique');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

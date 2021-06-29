<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210526082354 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agences ADD ville_id INT NOT NULL');
        $this->addSql('ALTER TABLE agences ADD CONSTRAINT FK_B46015DDA73F0036 FOREIGN KEY (ville_id) REFERENCES villes (id)');
        $this->addSql('CREATE INDEX IDX_B46015DDA73F0036 ON agences (ville_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agences DROP FOREIGN KEY FK_B46015DDA73F0036');
        $this->addSql('DROP INDEX IDX_B46015DDA73F0036 ON agences');
        $this->addSql('ALTER TABLE agences DROP ville_id');
    }
}

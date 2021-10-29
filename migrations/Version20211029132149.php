<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211029132149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FB1E7706E');
        $this->addSql('DROP INDEX IDX_EB95123FB1E7706E ON restaurant');
        $this->addSql('ALTER TABLE restaurant CHANGE restaurant_id ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('CREATE INDEX IDX_EB95123FA73F0036 ON restaurant (ville_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FA73F0036');
        $this->addSql('DROP INDEX IDX_EB95123FA73F0036 ON restaurant');
        $this->addSql('ALTER TABLE restaurant CHANGE ville_id restaurant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FB1E7706E FOREIGN KEY (restaurant_id) REFERENCES ville (id)');
        $this->addSql('CREATE INDEX IDX_EB95123FB1E7706E ON restaurant (restaurant_id)');
    }
}

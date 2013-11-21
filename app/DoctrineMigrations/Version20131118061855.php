<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131118061855 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE Term (id INT AUTO_INCREMENT NOT NULL, term VARCHAR(100) NOT NULL, count INT NOT NULL, INDEX term_idx (term), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE TermFrequency (id INT AUTO_INCREMENT NOT NULL, term_id INT DEFAULT NULL, count INT NOT NULL, tfidf DOUBLE PRECISION NOT NULL, item_id INT NOT NULL, INDEX IDX_B6664A91E2C35FC (term_id), UNIQUE INDEX url_idx (term_id, item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE TermFrequency ADD CONSTRAINT FK_B6664A91E2C35FC FOREIGN KEY (term_id) REFERENCES Term (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE TermFrequency DROP FOREIGN KEY FK_B6664A91E2C35FC");
        $this->addSql("DROP TABLE Term");
        $this->addSql("DROP TABLE TermFrequency");
    }
}

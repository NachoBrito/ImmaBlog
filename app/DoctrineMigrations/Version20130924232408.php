<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20130924232408 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Thought ADD parent_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE Thought ADD CONSTRAINT FK_5E06A6F0727ACA70 FOREIGN KEY (parent_id) REFERENCES Thought (id)");
        $this->addSql("CREATE INDEX IDX_5E06A6F0727ACA70 ON Thought (parent_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Thought DROP FOREIGN KEY FK_5E06A6F0727ACA70");
        $this->addSql("DROP INDEX IDX_5E06A6F0727ACA70 ON Thought");
        $this->addSql("ALTER TABLE Thought DROP parent_id");
    }
}

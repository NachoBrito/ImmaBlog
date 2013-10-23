<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131023070624 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Thought ADD author_id INT DEFAULT NULL, ADD author_avatar_url VARCHAR(255) NOT NULL, ADD author_name VARCHAR(255) NOT NULL");
        $this->addSql("ALTER TABLE Thought ADD CONSTRAINT FK_5E06A6F0F675F31B FOREIGN KEY (author_id) REFERENCES fos_user (id)");
        $this->addSql("CREATE INDEX IDX_5E06A6F0F675F31B ON Thought (author_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Thought DROP FOREIGN KEY FK_5E06A6F0F675F31B");
        $this->addSql("DROP INDEX IDX_5E06A6F0F675F31B ON Thought");
        $this->addSql("ALTER TABLE Thought DROP author_id, DROP author_avatar_url, DROP author_name");
    }
}

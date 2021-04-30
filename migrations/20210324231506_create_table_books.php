<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableBooks extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $books = $this->table('books');
        $books->addColumn('title', 'string', ['limit' => 30])
              ->addColumn('author', 'string', ['limit' => 20])
              ->addColumn('year', 'integer', ['limit' => 4])
              ->addColumn('pages', 'integer', ['limit' => 4])
              ->addColumn('description', 'text')
              ->addColumn('views', 'integer', ['limit' => 6])
              ->addColumn('wants', 'integer', ['limit' => 6])
              ->addColumn('status', 'integer', ['limit' => 1])
              ->addColumn('image_link', 'string', ['limit' => 30])
              ->addColumn('updated_at', 'datetime')
              ->addColumn('created_at', 'datetime')
              ->create();
    }
}

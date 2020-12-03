<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class MyNewMigration extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('post_migration');
        $table->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime')
            ->addColumn('title', 'string')
            ->addColumn('body', 'text')
            ->create();
    }
}

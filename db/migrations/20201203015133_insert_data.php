<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class InsertData extends AbstractMigration
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
    public function up()
    {
        // Code à éxécuter en cas de migration (pour avancer)

        // inserting only one row
        $singleRow = [
            'id' => 1,
            'title' => 'In Progress',
            'body' => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum'
        ];

        $table = $this->table('post_migration');
        $table->insert($singleRow);
        $table->saveData();

        // inserting multiple rows
        $rows = [
            [
                'id' => 2,
                'title' => 'Stopped',
                'body' => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum'
            ],
            [
                'id' => 3,
                'title' => 'Queued',
                'body' => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum'

            ]
        ];

        $this->table('post_migration')->insert($rows)->save();
    }

    public function down()
    {
        // Code à éxécuter en cas de rollback (pour reculer)
        $this->execute('DELETE FROM post_migration');
    }
}

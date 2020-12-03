<?php
use Phinx\Seed\AbstractSeed;

class FillPostTable extends AbstractSeed
{
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        $posts = [];
        for ($i = 0; $i < 100; ++$i) {
            $timestamp = $faker->unixTime('now');
            $posts[] = [
                'title' => $faker->sentence(15),
                'body' => $faker->text(300),
                'created_at' => date('Y-m-d H:i:s', $timestamp),
                'updated_at' => date('Y-m-d H:i:s', $timestamp),
            ];
        }

        $this->insert('post_migration', $posts);
    }
}

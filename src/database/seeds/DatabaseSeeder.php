<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('商品が1件登録済シーダ::class');
        $this->call('商品が複数登録済シーダ::class');
    }
}

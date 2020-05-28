<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
   {
        //取消批量赋值白名单、黑名单属性校验
        Model::unguard();

        $this->call('TagsTableSeeder');
        $this->call('PostsTableSeeder');

        //恢复校验
        Model::reguard();
    }
}

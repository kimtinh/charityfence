<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            ['name' => 'Campaign', 'parent_id' => null, 'created_at' => Now(), 'updated_at' => Now()],
            ['name' => 'Từ thiện', 'parent_id' => 1 , 'created_at' => Now(), 'updated_at' => Now()],
            ['name' => 'Trẻ em', 'parent_id' => 1, 'created_at' => Now(), 'updated_at' => Now()],
            ['name' => 'Khó khăn', 'parent_id' => 1, 'created_at' => Now(), 'updated_at' => Now()],
            ['name' => 'Khuyết tật', 'parent_id' => 1, 'created_at' => Now(), 'updated_at' => Now()],
            ['name' => 'Giáo dục', 'parent_id' => 1, 'created_at' => Now(), 'updated_at' => Now()],
            ['name' => 'Khác', 'parent_id' => 1, 'created_at' => Now(), 'updated_at' => Now()],
            ['name' => 'Post', 'parent_id' => null, 'created_at' => Now(), 'updated_at' => Now()],
        ]);
    }
}

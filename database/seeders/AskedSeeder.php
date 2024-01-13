<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AskedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => '1-xona', 'text' => 'Bu 1-xona'],
            ['title' => '2-xona', 'text' => 'Bu 2-xona'],
        ];
        foreach ($data as $name) {
            DB::table('askeds')->insert($name);
        }
    }
}

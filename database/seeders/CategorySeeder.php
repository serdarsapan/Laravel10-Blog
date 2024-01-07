<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->dummyData() as $key) {
            Category::updateOrCreate([
                'slug' => $key['slug'],
                'name' => $key['name'],
                'parent' => $key['parent'],
                'status' => $key['status'],
            ]);
        }

    }


    /**
     * @return array[]
     */
    public function dummyData(): array
    {
        return [
            1 => [
                'name' => 'BackEnd',
                'slug' => 'back_end',
                'parent' => null,
                'status' => 1,

            ],
            2 => [
                'name' => 'FrontEnd',
                'slug' => 'front_end',
                'parent' => null,
                'status' => 1,
            ],
            3 => [
                'name' => 'DevOps',
                'slug' => 'dev_ops',
                'parent' => null,
                'status' => 1,
            ],
            4 => [
                'name' => 'PHP',
                'slug' => 'php',
                'parent' => 1,
                'status' => 1,

            ],
            5 => [
                'name' => 'Python',
                'slug' => 'python',
                'parent' => 1,
                'status' => 1,
            ],
            6 => [
                'name' => 'JavaScript',
                'slug' => 'javascript',
                'parent' => 2,
                'status' => 1,
            ],


        ];
    }
}

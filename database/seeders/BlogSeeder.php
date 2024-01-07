<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->dummyData() as $key) {
           $blog = Blog::updateOrCreate([
                'title' => $key['title'],
                'user_id' => $key['user_id'],
                'slug' => $key['slug'],
                'content' => $key['content'],
                'status' => $key['status'],
            ]);
           BlogCategory::insert([
               'blog_id' => $blog->id,
               'category_id' => 1
           ]);
            BlogCategory::insert([
                'blog_id' => $blog->id,
                'category_id' => 2
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
                'user_id' => 1,
                'title' => 'PHP array fonksiyonları',
                'slug' => 'php_array_fonskiyonları',
                'content' => 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500 lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960 larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.',
                'status' => 1
            ],
            2 => [
                'user_id' => 2,
                'title' => 'Javascript array fonksiyonları',
                'slug' => 'javascript_array_fonskiyonları',
                'content' => 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500 lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960 larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.',
                'status' => 1
            ],


        ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\blog;
use Illuminate\Support\Facades\File;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json=File::get(path:'database/json/blogs.json');
        $blogs=collect(json_decode($json));
    
        $blogs->each(function($blog){
             blog::create([
            'post_name'=>$blog->post_name,
            'post_desc'=>$blog->post_desc,
            'post_image'=>$blog->post_image, 
         ]);
        });
    }
}

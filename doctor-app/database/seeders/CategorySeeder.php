<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'АКУШЕРСТВО И ГИНЕКОЛОГИЯ',
            'ГАСТРОЭНТЕРОЛОГИЯ',
            'ГЕНЕТИКА',
            'ДЕРМАТОВЕНЕРОЛОГИЯ',
            'КАРДИОЛОГИЯ',
            'НЕВРОЛОГИЯ',
            'ОНКОЛОГИЯ',
            'ОТОРИНОЛАРИНГОЛОГИЯ',
            'ОФТАЛЬМОЛОГИЯ',
            'ПЕДИАТРИЯ',
            'РЕНТГЕН, МРТ И КТ',
            'СТОМАТОЛОГИЯ',
            'УЗИ',
            'УРОЛОГИЯ',
            'ХИРУРГИЯ',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert(
                [
                    'title' => $category,
                ]
            );
        }
        $category = Category::all();
        $doctor = Doctor::all();

        foreach ($doctor as $d){
            $d->category()->sync($category);
        }
    }
}

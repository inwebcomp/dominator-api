<?php

use App\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 5; $i <= 9; $i++) {
            for ($l = 0; $l < 6; $l++) {
                $grade = new Grade();
                $grade->title = $i . ['a', 'a+', 'b', 'b+', 'c', 'c+'][$l];
                $grade->save();
            }
        }
    }
}

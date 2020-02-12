<?php

use Illuminate\Database\Seeder;
use SON\Models\Student;
use SON\Models\ClassInformation;

class ClassInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::all();
        factory(ClassInformation::class,50)
            ->create()
            ->each(function (ClassInformation $model) use($students){
                $studentsCol = $students->random(10);
                $model->students()->attach($studentsCol->pluck('id'));
            });
    }
}

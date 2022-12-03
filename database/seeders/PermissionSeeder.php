<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    //seeders is a folder in database folder to store all the seeders 
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'promote alunos']);

        Permission::create(['name' => 'create notices']);
        Permission::create(['name' => 'view notices']);
        Permission::create(['name' => 'edit notices']);
        Permission::create(['name' => 'delete notices']);

        Permission::create(['name' => 'create events']);
        Permission::create(['name' => 'view events']);
        Permission::create(['name' => 'edit events']);
        Permission::create(['name' => 'delete events']);

        Permission::create(['name' => 'create monitor']);
        Permission::create(['name' => 'view monitor']);
        Permission::create(['name' => 'edit monitor']);
        Permission::create(['name' => 'delete monitor']);

        Permission::create(['name' => 'criar cronogramas']);
        Permission::create(['name' => 'Ver Cronogramas']);
        Permission::create(['name' => 'edit cronogramas']);
        Permission::create(['name' => 'delete cronogramas']);

        Permission::create(['name' => 'create exams']);
        Permission::create(['name' => 'view exams']);
        Permission::create(['name' => 'delete exams']);
        Permission::create(['name' => 'create exams rule']);
        Permission::create(['name' => 'view exams rule']);
        Permission::create(['name' => 'edit exams rule']);
        Permission::create(['name' => 'delete exams rule']);
        Permission::create(['name' => 'view exams history']);

        Permission::create(['name' => 'create grading systems']);
        Permission::create(['name' => 'view grading systems']);
        Permission::create(['name' => 'edit grading systems']);
        Permission::create(['name' => 'delete grading systems']);
        Permission::create(['name' => 'create grading systems rule']);
        Permission::create(['name' => 'view grading systems rule']);
        Permission::create(['name' => 'edit grading systems rule']);
        Permission::create(['name' => 'delete grading systems rule']);

        Permission::create(['name' => 'take attendances']);
        Permission::create(['name' => 'view attendances']);
        Permission::create(['name' => 'update attendances type']);

        Permission::create(['name' => 'submit assignments']);
        Permission::create(['name' => 'create assignments']);
        Permission::create(['name' => 'view assignments']);

        Permission::create(['name' => 'save marks']);
        Permission::create(['name' => 'view marks']);

        Permission::create(['name' => 'create school sessions']);

        Permission::create(['name' => 'create semesters']);
        Permission::create(['name' => 'view semesters']);
        Permission::create(['name' => 'edit semesters']);
        Permission::create(['name' => 'assign teachers']);
        Permission::create(['name' => 'create courses']);
        Permission::create(['name' => 'view courses']);
        Permission::create(['name' => 'edit courses']);

        Permission::create(['name' => 'view academic settings']);
        Permission::create(['name' => 'update marks submission window']);
        Permission::create(['name' => 'update browse by session']);

        Permission::create(['name' => 'create classes']);
        Permission::create(['name' => 'view classes']);
        Permission::create(['name' => 'Editar materias']);
        // Permission::create(['name' => 'delete classes']);
        
        Permission::create(['name' => 'create sections']);
        Permission::create(['name' => 'view sections']);
        Permission::create(['name' => 'Editar Turmas']);
        // Permission::create(['name' => 'delete sections']);

        $user = \App\Models\User::factory()->create([
            'email' => 'admin@puccampinas.edu.br',
            'primeiro_nome' => 'Leandro',
            'sobrenome' => 'Xastre'
        ]);
        $user->givePermissionTo(
            'create school sessions',
            'update browse by session',
            'create semesters',
            'edit semesters',
            'assign teachers',
            'create courses',
            'view courses',
            'edit courses',
            'create classes',
            'view classes',
            'Editar materias',
            'create sections',
            'view sections',
            'Editar Turmas',
            'create exams',
            'view exams',
            'create exams rule',
            'edit exams rule',
            'delete exams rule',
            'view exams rule',
            'criar cronogramas',
            'Ver Cronogramas',
            'edit cronogramas',
            'delete cronogramas',
            'view marks',
            'view academic settings',
            'update marks submission window',
            'create users',
            'edit users',
            'view users',
            'promote alunos',
            'update attendances type',
            'view attendances',
            'take attendances',//Teacher only
            'create grading systems',
            'view grading systems',
            'edit grading systems',
            'delete grading systems',
            'create grading systems rule',
            'view grading systems rule',
            'edit grading systems rule',
            'delete grading systems rule',
            'create notices',
            'view notices',
            'edit notices',
            'delete notices',
            'create events',
            'view events',
            'edit events',
            'delete events',
            'create monitor',
            'view monitor',
            'edit monitor',
            'delete monitor',
            'view assignments'
        );
    }
}

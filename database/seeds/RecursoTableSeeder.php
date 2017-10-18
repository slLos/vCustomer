<?php
/**
 * Created by PhpStorm.
 * User: Santiago Ortega
 * Date: 18/03/2015
 * Time: 06:17 PM
 */

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RecursoTableSeeder extends Seeder {

    public function run()
    {
        $faker= Faker:: create();

        for($i=0;$i < 20;$i ++)
        {
            \DB::table('recurso')->insert(array(
                'ISBN'         => $faker->unique()->randomNumber,
                'titulo'       => $faker->title,
                'resumen'      => $faker->realText($maxNbChars = 50, $indexSize = 2) ,
                'totalPaginas' => $faker->numberBetween($min = 100, $max = 900),
                'tipoLibro'    => 'cientifico',
                'revista'      => 'colciencias',
                'monografia'   => 'investigacion',
                'codEditorial' => $cod=$faker->unique()->buildingNumber
            ));

            \DB::table('editorial')->insert(array(

                'codigo'          =>$cod,
                'nombreEditorial' =>$faker->userName
            ));
        }
    }

}
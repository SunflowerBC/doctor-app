<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//       $hospitals = [
//           'SitiMed',
//           'Талап',
//           'ИНТЕРТИЧ',
//           'Uniserv Medical Center',
//           'Mediker',
//           'DiVera ',
//           'Dent-Lux',
//           'Жайык Дент'
//       ];
//
//       foreach ($hospitals as $hospital){
//
//           DB::table('hospitals')->insert([
//               'title' => $hospital,
//           ]);
//       }
//
//       $hospital = Hospital::all();
//
//       $doctors = Doctor::all();
//
//       foreach ($doctors as $d){
//           $d->hospital()->sync($hospital);
//       }
    }
}

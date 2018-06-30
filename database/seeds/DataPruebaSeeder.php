<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\IncidenceType;
use App\CompanyType;
use App\Company;
use App\Client;
use App\Question;
use App\Role;
use App\User;

class DataPruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncidenceType::create(['type' => 'Documento Dañado']);
        IncidenceType::create(['type' => 'Imagen Defectuosa']);
        IncidenceType::create(['type' => 'Falta de documento']);
        IncidenceType::create(['type' => 'Documento Vencido']);

        $c1 = CompanyType::create(['type'=> ' Agro-Industria ' ]);
        $c2 = CompanyType::create(['type'=> 'Vigilancia' ]);
        $c3 = CompanyType::create(['type'=> 'Alimentos']);
        $c4 = CompanyType::create(['type'=> 'Otros' ]);

        for ($i=0; $i < 10; $i++) { 
            Company::create([
                'name' => 'company n° '. $i, 
                'identity' => 'C-000'.$i,
                'address' =>'adress ',
                'phone' => 'phone',
                'company_type_id' => $c1->id]);
        }

        for ($i=10; $i < 20; $i++) { 
            Company::create([
                'name' => 'company n° '. $i, 
                'identity' => 'C-000'.$i,
                'address' =>'adress ',
                'phone' => 'phone',
                'company_type_id' => $c2->id]);
        }


        for ($i=20; $i < 30; $i++) { 
            Company::create([
                'name' => 'company n° '. $i, 
                'identity' => 'C-000'.$i,
                'address' =>'adress ',
                'phone' => 'phone',
                'company_type_id' => $c3->id]);
        }

        for ($i=30; $i < 40; $i++) { 
            Company::create([
                'name' => 'company n° '. $i, 
                'identity' => 'C-000'.$i,
                'address' =>'adress ',
                'phone' => 'phone',
                'company_type_id' => $c4->id]);
        }

        $client=  Client::create(['username' => 'client 1','password' => '1234','company_id' => Company::first()->id ]);
        Question::create(['question' => 'Question Number 1','client_id' => $client->id ]);
        Question::create(['question' => 'Question Number 2','client_id' => $client->id ]);
        Question::create(['question' => 'Question Number 3','client_id' => $client->id ]);
        Question::create(['question' => 'Question Number 4','client_id' => $client->id ]);
        Question::create(['question' => 'Question Number 5','client_id' => $client->id ]);
        Question::create(['question' => 'Question Number 6','client_id' => $client->id ]);
        Question::create(['question' => 'Question Number 7','client_id' => $client->id ]);


        $roleAdmin = Role::create(['role' => 'Administrador ']);
        $user = User::create([
            'role_id' => $roleAdmin->id,
            'surname' => 'Rhonal',
            'name' => 'Rhonal',
            'email' => 'rhonalchirinos@gmail.com',
            'password' => Hash::make('1234')
        ]);
    }
}

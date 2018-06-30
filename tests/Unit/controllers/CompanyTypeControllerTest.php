<?php

namespace Tests\Unit\controllers;
use App\CompanyType;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;

class CompanyTypeControllerTest extends TestCase
{
 	use RefreshDatabase;
    /**
     *
     * @return void
     */
    public function testIndex()
    {
        Passport::actingAs(factory(User::class)->create(),['create-servers']);        
        $response = $this->json('GET',route('company-type.index'));
        $response->assertStatus(200);
    }


    /**
     *
     * @return void
     */
    public function testCreateCompany()
    {
        Passport::actingAs(factory(User::class)->create(),['create-servers']);        
        $response = $this->json('POST',route('company-type.store'),['type' => 'Company A']);
        $response->assertStatus(201);
    }

    /**
     *
	 * @return void 
	 */
    public function testShowCompany()
    {
        Passport::actingAs(factory(User::class)->create(),['create-servers']);        
        $company = factory(CompanyType::class)->create();
        $this->assertNotNull($company->id);
        $response = $this->json('GET',route('company-type.show',['company_type' => $company->id]));
        $response->assertStatus(200)->assertJson([
            'data' => [
            	'type' => $company->type,
            	'id' => $company->id
            ],
        ]);
    }


    public function testUpdateCompany()
    {
        Passport::actingAs(factory(User::class)->create(),['create-servers']);        
        $company = factory(CompanyType::class)->create();
        $this->assertNotNull($company->id);
        $response = $this->json('PUT',route('company-type.update',['company_type' => $company->id]), ['type' => 'Actualizacion']);
        $response->assertStatus(200)->assertJson([
           	'type' => 'Actualizacion',
          	'id' => $company->id
        ]);
    }

    public function testDeleteCompany()
    {
        Passport::actingAs(factory(User::class)->create(),['create-servers']);        
        $company = factory(CompanyType::class)->create();
        $this->assertNotNull($company->id);
        $response = $this->json('DELETE',route('company-type.destroy',['document_type' => $company->id]));
        $response->assertStatus(204);
    }


}

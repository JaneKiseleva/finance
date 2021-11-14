<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery;

class FeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function tearDown(): void
    {
        mockery::close();
    }

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_income()
    {
        $response = $this->get('/operations/income/create');

        $response->assertStatus(200);
    }

    public function test_structure_income()
    {
        $response = $this->get('/operations/income/create');

        $response->assertJsonStructure([
            "name",
            "sum",
            "period" => [
                "one-time",
                "monthly"],
            "description"
        ]);
    }

    public function test_validate_income_period_onetime()
    {
        $response = $this->postJson('/operations/income/create',
            [
                "name" => "Income",
                "sum" => 10000,
                "period" => "one-time",
                "description" => "Ok"
            ]);
        $response
            ->assertStatus(200);
    }

    public function test_validate_income_period_monthly()
    {
        $response = $this->postJson('/operations/income/create',
            [
                "name" => "Income",
                "sum" => 10000,
                "period" => "monthly",
                "description" => "Ok"
            ]);
        $response
            ->assertStatus(200);
    }


    public function test_validate_income_description()
    {
        $response = $this->postJson('/operations/income/create',
            [
                "name" => "Income",
                "sum" => 10000,
                "period" => "one-time",
                "description" => "Ok"
            ]);
        $response
            ->assertStatus(200);
    }

    public function test_validate_income_sum_negative_number()
    {
        $response = $this->postJson('/operations/income/create',
            [
                "name" => "Income",
                "sum" => -4500,
                "period" => "one-time",
                "description" => "Ok"
            ]);
        $response
            ->assertStatus(200);
    }

    public function test_validate_income_sum_null()
    {
        $response = $this->postJson('/operations/income/create',
            [
                "name" => "Income",
                "sum" => 0,
                "period" => "one-time",
                "description" => "Ok"
            ]);
        $response
            ->assertStatus(200);
    }

    public function test_validate_income_description_text()
    {
        $response = $this->postJson('/operations/income/create',
            [
                "name" => "Income",
                "sum" => 0,
                "period" => "monthly",
                "description" => "Ok45gj,fk/4,f"
            ]);
        $response
            ->assertStatus(200);
    }

    public function test_structure_expenditure()
    {
        $response = $this->get('/operations/expenditure/create');

        $response->assertJsonStructure([
            "name",
            "sum",
            "period" => [
                "one-time",
                "monthly"],
            "description"
        ]);
    }

    public function test_validate_expenditure_period_onetime()
    {
        $response = $this->postJson('/operations/expenditure/create',
            [
                "name" => "Expenditure",
                "sum" => 10000,
                "period" => "one-time",
                "description" => "Ok"
            ]);
        $response
            ->assertStatus(200);
    }

    public function test_validate_expenditure_period_monthly()
    {
        $response = $this->postJson('/operations/expenditure/create',
            [
                "name" => "Expenditure",
                "sum" => 10000,
                "period" => "monthly",
                "description" => "Ok"
            ]);
        $response
            ->assertStatus(200);
    }

    public function test_validate_expenditure_description()
    {
        $response = $this->postJson('/operations/expenditure/create',
            [
                "name" => "Expenditure",
                "sum" => 10000,
                "period" => "one-time",
                "description" => "Ok"
            ]);
        $response
            ->assertStatus(200);
    }


    public function test_validate_expenditure_sum_negative_number()
    {
        $response = $this->postJson('/operations/expenditure/create',
            [
                "name" => "Expenditure",
                "sum" => -4500,
                "period" => "one-time",
                "description" => "Ok"
            ]);
        $response
            ->assertStatus(200);
    }


    public function test_validate_expenditure_sum_null()
    {
        $response = $this->postJson('/operations/expenditure/create',
            [
                "name" => "Income",
                "sum" => 0,
                "period" => "monthly",
                "description" => "Ok"
            ]);
        $response
            ->assertStatus(200);
    }

    public function test_validate_expenditure_description_text()
    {
        $response = $this->postJson('/operations/expenditure/create',
            [
                "name" => "Expenditure",
                "sum" => 0,
                "period" => "monthly",
                "description" => "Ok45gj,fk/4,f"
            ]);
        $response
            ->assertStatus(200);
    }

    public function test_target()
    {
        $response = $this->get('/operations/target/create');

        $response->assertStatus(200);
    }

    public function test_structure_target()
    {
        $response = $this->get('/operations/target/create');

        $response->assertJsonStructure([
            "name",
            "target_current_cost",
            "planned_date",
            "description"
        ]);
    }

    public function test_validate_target_name()
    {
        $response = $this->postJson('/operations/target/create',
            [
                "name" => "Target",
                "target_current_cost" => 5000,
                "planned_date" => "21-07-2021",
                "description" => 'Ok'
            ]);
        $response
            ->assertStatus(200);
    }

    public function test_validate_target_null_description()
    {
        $response = $this->postJson('/operations/target/create',
            [
                "name" => "Target",
                "target_current_cost" => 5000,
                "planned_date" => "21-07-2021",
                "description" => ''
            ]);
        $response
            ->assertStatus(200);
    }
}

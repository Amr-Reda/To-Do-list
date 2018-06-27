<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskApiTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testGetAllTasks()
    {
        $response = $this->json('GET', '/api/tasks');

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => true,
            ]);
    }

    /**
     *
     * @return void
     */
    public function testCreateTask()
    {
        $response = $this->json('POST', '/api/tasks', ['name' => 'insertedTest']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'data' => true,
            ]);
            
    }

    /**
     *
     * @return void
     */
    public function testDestroyTask()
    {
        //the id must be exist in the database
        $response = $this->json('Delete', '/api/tasks/5b34016cf88cef11af7d3b96');

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'msg' => 'deleted successfully',
            ]);
            
    }
}

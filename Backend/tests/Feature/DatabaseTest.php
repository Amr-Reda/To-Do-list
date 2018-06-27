<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{
    /**
     * test collections in the database.
     *
     * @return void
     */
    public function testCollections()
	{
		$this->assertDatabaseHas('tasks', [
		    'name' => 'insertedTest'
		]);
	}
}

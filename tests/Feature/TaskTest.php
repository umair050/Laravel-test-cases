<?php

namespace Tests\Feature;

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task; // Make sure this path is correct

class TaskTest extends TestCase
{
    use WithFaker;



    public function testGetTasks()
    {
    //     // Create some fake tasks in the database
    //     // Task::factory()->count(3)->create();

        $response = $this->get('/tasks');

        $response = $this->get('/tasks?id=1');

    //     // // dump($response->content());

         $response->assertStatus(200);
    //     // // dd($response->content());
        $response->assertStatus(200);
        $response->assertJson([
            'id' => 1,
            'title' => 'Rerum quos a cum aut.',
            'description' => 'In molestias assumenda sed laborum. Aut ut dolor eligendi omnis quia. Aperiam accusantium cupiditate dolore voluptas velit optio.',
           
        ]);

    }

    public function testCreateTask()
    {
        $response = $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class)
            ->post('/tasks', [
                'title' => 'New Task',
                'description' => 'Description of the new task',
            ]);

            $response->assertStatus(201);

        $response->assertJsonStructure([
            'title',
            'description',
            'updated_at',
            'created_at',
            'id',
        ]);
        
        // Optionally, you can assert specific values in the response
        $response->assertJson([
            'title' => 'New Task',
            'description' => 'Description of the new task',
        ]);
        
        // You can also assert that the 'id' is an integer
        $response->assertJson([
            'id' => true,
        ]);
        // Assert a successful response
        // $response->assertStatus(201);
    }
}

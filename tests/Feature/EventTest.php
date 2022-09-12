<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class EventTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
        $this->user = User::factory()->create();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateEvent()
    {
        // dd($this->user->uid);
        $token = $this->login();

        $data =  [
            'user_id' => (string)$this->user->uid,
            'event_name' => fake()->name(),
            'location' => fake()->address(),
            'event_date' => fake()->date(),
            'start_time' => Carbon::now()->addDays(7),
            'maximun_seats' => rand(70, 1000),
            'description' => fake()->word(),
            'type' => 'free',
            'status' => 'active'
        ];

        $response = $this->post('/api/event/create', $data, ['Authorization' => 'Bearer ' . $token]);
        $response->assertStatus(200);
    }

    private function login()
    {
        $loginDetails = [
            'email' => $this->user->email,
            "password" => 'password'
        ];

        $login = $this->post('/api/signin', $loginDetails);
        return $login['data']['token'];
    }
}

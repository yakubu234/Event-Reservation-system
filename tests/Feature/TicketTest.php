<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class TicketTest extends TestCase
{
    private $user;
    private $event;
    private $token;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
        $this->user = User::factory()->create();

        $this->token = $this->login();

        $eventdata =  [
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

        $this->event = $this->post('/api/event/create', $eventdata, ['Authorization' => 'Bearer ' . $this->token]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateTicket()
    {

        $data =  [
            'uid' => Str::orderedUuid(),
            'event_id' => $this->event['data']['event']['id'],
            'amount' => 50000,
            'type' => 'gold',
            'maximum_reservation' => rand(0, 50)
        ];

        $response = $this->post('/api/event/create-ticket', $data, ['Authorization' => 'Bearer ' . $this->token]);
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

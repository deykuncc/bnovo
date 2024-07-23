<?php

namespace Guest;

use App\Models\Guest;
use Tests\TestCase;

class GuestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_1_store_guest(): void
    {
        $this->withoutExceptionHandling();

        $data = [
            "first_name" => fake()->name(),
            "last_name" => fake()->name(),
            "email" => fake()->email(),
            "phone" => "+7999999" . random_int(10, 99),
        ];

        $response = $this->post('/api/guests', $data);

        dump($response->json());
        $response->assertStatus(200);
    }

    public function test_2_show_guest(): void
    {
        $guestId = Guest::query()->orderBy('id', 'DESC')->value('id');
        $response = $this->get('/api/guests/' . $guestId);
        dump($response->json());
        $response->assertStatus(200);
    }

    public function test_3_update_guest(): void
    {
        $guestId = Guest::query()->orderBy('id', 'DESC')->value('id');
        $data = ['first_name' => fake()->name(), 'last_name' => fake()->name(), 'email' => fake()->email(), 'country' => "Беларусь"];
        $response = $this->put("/api/guests/$guestId", $data);
        dump($response->json());
        $response->assertStatus(200);
    }

    public function test_4_index_guests(): void
    {
        /*
         *  Доступные параметры
         *  GET: int limit
         *  GET: int page
         */
        $response = $this->get('/api/guests?page=1&limit=20');
        dump($response->json());
        $response->assertStatus(200);
    }

    public function _5_destroy_guest(): void
    {
        $guestId = (int)Guest::query()->orderBy('id', 'DESC')->value('id');
        $response = $this->delete("/api/guests/$guestId");
        dump($response->json());
        $response->assertStatus(200);
    }
}


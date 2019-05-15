<?php

namespace Tests\Unit;

use Tests\TestCase;

class BookingTest extends TestCase
{

    public function testBookOk()
    {
        $data = [
            'activity_id' => 1,
            'number_of_users' => 2,
            'booking_price' => 29.50,
            'start_date' => '2019-05-17',
        ];
        $response = $this->post( url('book'), $data);
        $response->assertStatus(201);
        $this->assertTrue(isset(json_decode($response->content())->id));
    }

    public function testBookKo()
    {
        $data = [
            'activity_id' => 'bad_ativity_id',
            'number_of_users' => 2,
            'booking_price' => 29.50,
            'start_date' => '2019-05-17',
        ];
        $response = $this->post( url('book'), $data);
        $response->assertStatus(302);
        $this->assertFalse(isset(json_decode($response->content())->id));
    }

}

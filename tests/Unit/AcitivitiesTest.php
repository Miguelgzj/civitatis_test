<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;

class AcitivitiesTest extends TestCase
{

    public function testGetActivities()
    {
        $this->post( url('activities'), ['date'=>Carbon::today(), 'numberOfUsers'=>2])
            ->assertStatus(200);
    }
}

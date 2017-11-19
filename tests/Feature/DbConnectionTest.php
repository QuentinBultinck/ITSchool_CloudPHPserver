<?php

namespace Tests\Feature;

use Mockery\Exception;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DbConnectionTest extends TestCase
{
    public function testDBConnection()
    {
        try {
            DB::connection();
            $this->assertTrue(true);
        } catch (Exception $e) {
            $this->assertTrue(false);
        }

    }
}

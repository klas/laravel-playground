<?php

namespace Tests\Unit;

use App\Services\TimeCalculatorService;
use PHPUnit\Framework\TestCase;

class TimeCalculatorServiceTest extends TestCase
{
    public function testSum()
    {
        $timeCalculatorService = new TimeCalculatorService();

        $items = [
            ['start' => '2024-06-16 22:25:42', 'end' => '2024-06-16 23:46:05'],
            ['start' => '2024-05-23 23:13:26', 'end' => '2024-05-24 00:54:59'],
            ['start' => '2024-06-12 09:41:55', 'end' => '2024-06-12 13:00:37'],
            ['start' => '2024-06-09 11:09:17', 'end' => '2024-06-09 12:14:19'],
            ['start' => '2024-06-12 00:20:13', 'end' => '2024-06-12 01:21:22'],
            ['start' => '2024-06-11 11:38:06', 'end' => '2024-06-11 14:13:32'],
            ['start' => '2024-05-30 12:46:41', 'end' => '2024-05-30 14:44:36'],
        ];

        //dd(collect($items));

        $this->assertEquals('13 hours, 10 seconds', $timeCalculatorService->sumTimes(collect($items),
            'start', 'end'));
    }
}

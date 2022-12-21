<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreinxaliRequest;
use App\Http\Requests\UpdateinxaliRequest;
use App\Models\inxali;
use Illuminate\Http\JsonResponse;

class InxaliController extends Controller
{
    /**
     * Return the specified message
     */
    public function say(string $input): JsonResponse
    {
        $code = 200;

        switch ($input) {
            case "hello":
                $message = "Hello";
                break;
            case "howareyou":
                $message = "I'm fine";
                break;
            default:
                $message = "Ah, nooooo";
                $code = 501;
        }

        return response()->json(
            ['message' => $message],
            $code
        );
    }

    /**
     * Return the specified time in appropriate timezone
     */
    public function datetime(string $time, string $timezone = 'EUROPE/BERLIN'): JsonResponse
    {
        $now = new \DateTime($time, new \DateTimeZone($timezone));
        $nextHour = (int)$now->add(new \DateInterval('PT1H'))->format('h');

        $minutesTo = 60 - (int)$now->format('i');
        $pmAm = $now->format('a');

        return response()->json([
            'message' => "It's " . $minutesTo . ' to ' . $nextHour . ' ' . $pmAm
        ],
            200
        );
    }

    /**
     * Return currently active timezone
     */
    public function timezone(): JsonResponse
    {
        return response()->json([
            'message' => date_default_timezone_get()],
            200
        );
    }
}

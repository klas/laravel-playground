<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
    public function datetime(Request $request, string $time, ?array $timeParams = []): JsonResponse
    {
        $timezone = null;
        $timeParams['timeContinent'] = $timeParams['timeContinent'] ?? 'EUROPE';

        try {
            if (isset($timeParams['timeZone'])) {
                $timezone = new DateTimeZone($timeParams['timeZone']);
            } elseif (isset($timeParams['timeCity'])) {
                $timezone = new DateTimeZone($timeParams['timeContinent'] . '/' . $timeParams['timeCity']);
            } elseif ($request->getMethod() == 'POST') {
                try {
                    $validated = $request->validate([
                        'continent' => 'alpha',
                        'city' => 'required | alpha'
                    ]);
                } catch (ValidationException $exception) {
                    return response()->json([
                        'message' => 'Error: ' . $exception->getMessage()
                    ]);
                }

                $continent = $validated['continent'] ?? $timeParams['timeContinent'];
                $timezone = new DateTimeZone($continent . '/' . $validated['city']);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => 'Error: ' . $exception->getMessage()
            ]);
        }


        $now = new DateTime($time, $timezone);
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
            'message' => (new DateTime())->getTimezone()->getName()
        ],
            200
        );
    }
}

<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ExperimentalController extends Controller
{
    public static string $time = 'now';

    /**
     * Return the specified message
     */
    public function say(string $input): JsonResponse
    {
        $code = 200;

        switch ($input) {
            case "hello":
                $message = "hello";
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
     * @throws Exception
     */
    public function datetime(Request $request): JsonResponse
    {
        $timezone = null;

        try {
            if ($request->getMethod() == 'POST') {
                $validated = $request->validate([
                    'continent' => 'alpha',
                    'city' => 'required | alpha'
                ]);

                $continent = $validated['continent'] ?? 'EUROPE';
                $timezone = new DateTimeZone($continent . '/' . $validated['city']);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => 'Error: ' . $exception->getMessage()
            ],
                501);
        }

        $now = new DateTime(self::$time, $timezone);
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
            'city' => (new DateTime())->getTimezone()->getName()
        ],
            200
        );
    }
}

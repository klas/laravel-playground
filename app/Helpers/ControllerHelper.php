<?php

namespace App\Helpers;

use Illuminate\Http\Request;

trait ControllerHelper {
    protected function simpleWhereFilter(Request $request, &$activities)
    {
        foreach (self::FILTERS as $parameter => $type) {
            if ($request->filled($parameter)) {
                $activities = $activities->whereStrict($parameter, $request->$type($parameter));
            }
        }
    }
}

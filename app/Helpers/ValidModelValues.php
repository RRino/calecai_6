<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

/**
* Return all the values from the given table, column
*
*/
class ValidModelValues
{
    public static function getValues(string $table, string $column)
    {
        $values = DB::table($table)->pluck($column);
        return $values;
    }
}

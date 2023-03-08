<?php

use App\Models\User;
use Carbon\Carbon;

if (!function_exists('addCurrency')) {

    function addCurrency($amount)
    {
        $text = config('config.currency');
        return number_format($amount) . ' ' . $text;
    }

}

if (!function_exists('generateUserId')) {

    function generateUserId()
    {
        $user = User::orderBy('id', 'desc')->first();
        return $user ? ($user->id + 1) : 1;

    }

}

if (!function_exists('generateMemberId')) {

    function generateMemberId($id, $text = 'SSB-')
    {
        return ($text . $id);
    }

}

if (!function_exists('getLastWeek')) {

    function getLastWeek($length)
    {
        $i = 1;
        $date_array = array();

        while ($i <= $length) {
            $today = Carbon::today();
            array_push($date_array, $today->subDays($i)->format('l'));
            $i++;
        }
        return $date_array;
    }

}

<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ApiService
{
    public const API_PREFIX = '/admin/api/2023-04/';

    public static function get(string $endpoint, User $shop)
    {
       return $shop->api()->rest('GET', self::API_PREFIX . $endpoint)['body'];
    }

    public static function post(string $endpoint, User $shop, array $data = [])
    {
       return $shop->api()->rest('POST', self::API_PREFIX . $endpoint, $data);
    }
}

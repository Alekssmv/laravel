<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Str;


class StatisticsFormatData
{
    public function format(array $params, int $limit = 10): string
    {
        $res = '';
        if (isset($params['id'])) {
            $res .= 'id:' . $params['id'];
        }
        if (isset($params['name'])) {
            $res .= ' name:' . Str::limit($params['name'], $limit);
        }
        if (isset($params['title'])) {
            $res .= ' title:' . Str::limit($params['title'], $limit);
        }
        if (isset($params['len'])) {
            $res .= ' len:' . $params['len'];
        }
        if (isset($params['cnt'])) {
            $res .= ' cnt:' . $params['cnt'];
        }
        return $res;
    }
}

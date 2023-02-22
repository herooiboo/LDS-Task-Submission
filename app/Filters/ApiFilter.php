<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter
{
    protected $safeParams = [];

    protected $paramsColumnMap = [];

    protected $operatorMap = [];

    public function transform(Request $request)
    {
        $eloquery = [];
        foreach ($this->safeParams as $param => $operators) {
            $query = $request->query($param);
            if (!isset($query)) continue;
            $column = $this->paramsColumnMap[$param] ?? $param;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) $eloquery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
            }
        }
        return $eloquery;
    }
}

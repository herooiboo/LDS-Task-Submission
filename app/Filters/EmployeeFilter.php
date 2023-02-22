<?php

namespace App\Filters;

use Illuminate\Http\Request;

class EmployeeFilter extends ApiFilter
{
    protected $safeParams = [
        'id' => ['eq', 'gt', 'lt'],
        'firstName' => ['eq'],
        'lastName' => ['eq'],
        'address' => ['eq'],
        'email' => ['eq'],
        'contactNumber' => ['eq'],
    ];

    protected $paramsColumnMap = [
        'firstName' => 'first_name',
        'lastName' => 'last_name',
        'contactNumber' => 'contact_number',
    ];

    protected $operatorMap = [
        'gt' => '>',
        'lt' => '<',
        'eq' => '=',
        'lte' => '<=',
        'gte' => '>=',
        'neq' => '!='
    ];
}

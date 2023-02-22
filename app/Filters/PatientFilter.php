<?php

namespace App\Filters;

use Illuminate\Http\Request;

class PatientFilter extends ApiFilter
{

    protected $safeParams = [
        'id' => ['eq', 'gt', 'lt'],
        'firstName' => ['eq'],
        'lastName' => ['eq'],
        'address' => ['eq'],
        'email' => ['eq'],
        'contactNumber' => ['eq'],
        'details' => ['eq'],
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

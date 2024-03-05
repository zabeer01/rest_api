<?php

namespace App\Services\v1;

use Illuminate\Http\Request;


class CustomerQuery
{
    protected $allowedparms = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postalCode' => ['eq', 'gt', 'lt']
    ];
    protected $columMap = [
        'postalCode' => 'postal_code'
    ];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'lte' => '<=',
        'gte' => '>='
    ];
    public function transform(Request $request)
    {
        $eloQuery = [];
        foreach ($this->allowedparms as $parm => $operators) {
            $query = $request->query($parm);
            if ($query !== null) {
                $column = $this->columMap[$parm] ?? $parm;
                foreach ($operators as $operator) {
                    if ($request->has($parm . '_' . $operator)) {
                        $eloQuery[] = [$column, $this->operatorMap[$operator], $request->input($parm . '_' . $operator)];
                    }
                }
            }
        }
        return $eloQuery;
    }
    
    
}

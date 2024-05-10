<?php

namespace App\Services;

use Illuminate\Http\Request;

class DoctorQuery
{
protected array $safeParams = [
    'name' => ["eq", "like"],
    'surname' => ["eq", "like"],
    'patronymic' => ["eq", "like"],
    'categoryId' => ["eq"],
    'hospitalId' => ["eq"],
];

protected array $operatorMap =[
    'eq' => '=',
    'like' => 'like'
];

protected array $defaultAppointment = ['id', 'asc'];

private array $safeAppointmentParams = [
    'surname' => ["asc", "desc"],
    'categoryId' => ["asc", "desc"],
];

public function transform(Request $request)
{
    $eloQuery = [];
    foreach ($this->safeParams as $param => $operators){
        $query = $request->query($param);
        if(!isset($query)){
            continue;
        }
        $column = $this->columnMap[$param];

        foreach ($operators as $operator){
            if (isset($query[$operator])){
                if ($operator == 'like'){
                    $query[$operator] = "%{$query[$operator]}%";
                }
                $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
            }
        }
    }
    return $eloQuery;
}

public function transformAppointment(Request $request): array
{
    $appointmentBy = $request->query('_appointmentBy');
    foreach ($this->safeAppointmentParams as $param => $operators){
        if (isset($appointmentBy[$param])){
            $column = $this->columnMap[$param];
            $direction = $appointmentBy[$param];
            return [$column, $direction];
        }
    }
    return $this->defaultAppointment;
}

}

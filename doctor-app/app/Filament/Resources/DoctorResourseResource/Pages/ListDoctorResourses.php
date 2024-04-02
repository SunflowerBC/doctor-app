<?php

namespace App\Filament\Resources\DoctorResourseResource\Pages;

use App\Filament\Resources\DoctorResourse;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDoctorResourses extends ListRecords
{
    protected static string $resource = DoctorResourse::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\HospitalResourseResource\Pages;

use App\Filament\Resources\HospitalResourse;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHospitalResourse extends EditRecord
{
    protected static string $resource = HospitalResourse::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

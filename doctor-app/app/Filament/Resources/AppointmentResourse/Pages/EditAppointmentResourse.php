<?php

namespace App\Filament\Resources\AppointmentResourseResource\Pages;

use App\Filament\Resources\AppointmentResourse;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppointmentResourse extends EditRecord
{
    protected static string $resource = AppointmentResourse::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

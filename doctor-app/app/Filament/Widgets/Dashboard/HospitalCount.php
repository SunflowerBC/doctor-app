<?php

namespace App\Filament\Widgets\Dashboard;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Patient;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HospitalCount extends BaseWidget
{
    protected static ?string $pollingInterval = null;
    protected function getStats(): array
    {
        return [
            Stat::make('Hospitals', Hospital::count())
                ->icon('heroicon-o-building-office-2')
                ->description('Total count of hospitals in the system')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Doctors', Doctor::count())
                ->icon('heroicon-o-users')
                ->description('Total count of doctors in the system')
                ->chart([15, 4, 10, 2, 12, 4, 12])
                ->color('success'),
            Stat::make('Patients', Patient::count())
                ->icon('heroicon-o-user')
                ->description('Total count of patients in the system')
                ->chart([17, 16, 14, 15, 14, 13, 12])
                ->color('success'),
        ];
    }
}

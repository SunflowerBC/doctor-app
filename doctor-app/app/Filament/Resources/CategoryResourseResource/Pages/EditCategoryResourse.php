<?php

namespace App\Filament\Resources\CategoryResourseResource\Pages;

use App\Filament\Resources\CategoryResourse;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryResourse extends EditRecord
{
    protected static string $resource = CategoryResourse::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

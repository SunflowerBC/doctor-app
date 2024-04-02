<?php

namespace App\Filament\Resources\CategoryResourseResource\Pages;

use App\Filament\Resources\CategoryResourse;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategoryResourses extends ListRecords
{
    protected static string $resource = CategoryResourse::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

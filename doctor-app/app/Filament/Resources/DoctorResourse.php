<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DoctorResourseResource\Pages;
use App\Filament\Resources\DoctorResourseResource\RelationManagers;
use App\Models\Doctor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DoctorResourse extends Resource
{
    protected static ?string $model = Doctor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('surname')->required(),
                Forms\Components\TextInput::make('patronymic')->required(),

                Forms\Components\Select::make('category')->required()->relationship(titleAttribute: 'title'),
                Forms\Components\Select::make('hospital')->required()->relationship(titleAttribute: 'title'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('surname'),
                Tables\Columns\TextColumn::make('patronymic'),
                Tables\Columns\TextColumn::make('category.title'),
                Tables\Columns\TextColumn::make('hospital.title'),
                Tables\Columns\TextColumn::make('patient.name'),
                Tables\Columns\TextColumn::make('patient.surname'),
                Tables\Columns\TextColumn::make('patient.patronymic'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDoctorResourses::route('/'),
            'create' => Pages\CreateDoctorResourse::route('/create'),
            'edit' => Pages\EditDoctorResourse::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResourseResource\Pages;
use App\Filament\Resources\AppointmentResourseResource\RelationManagers;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppointmentResourse extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('state')->disabled(),
                Forms\Components\TextInput::make('appointmentDate')->disabled(),

                Forms\Components\TextInput::make('user')
                ->relationship(titleAttribute: 'email')
                ->columnSpanFull()->disabled(),

                Forms\Components\Repeater::make('doctor')
                ->relationship()
                ->schema([
                    Forms\Components\TextInput::make('name'),
                    Forms\Components\TextInput::make('surname'),
                    Forms\Components\TextInput::make('patronymic'),
                    Forms\Components\Select::make('category_id')->relationship('category'),
                    Forms\Components\Select::make('hospital_id')->relationship('hospital'),
                ])
                ->columnSpanFull()->disabled()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('state'),
                Tables\Columns\TextColumn::make('user.mail'),
                Tables\Columns\TextColumn::make('patient'),
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
            'index' => Pages\ListAppointmentResourses::route('/'),
            'create' => Pages\CreateAppointmentResourse::route('/create'),
            'edit' => Pages\EditAppointmentResourse::route('/{record}/edit'),
        ];
    }
}

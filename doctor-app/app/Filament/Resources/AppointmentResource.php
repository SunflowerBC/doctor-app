<?php

namespace App\Filament\Resources;

use App\Constants\AppointmentState;
use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Hospital;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('state')
                    ->options(
                        AppointmentState::array(),
                    )
                    ->default(AppointmentState::DRAFT),

                Forms\Components\DateTimePicker::make('appointment_date')
                    ->required()
                    ->native(false)
                    ->displayFormat('d/m/Y'),


                Forms\Components\Select::make("hospital")
                    ->required()
                    ->live()
                    ->options(Hospital::all()->pluck("title", "id")),

                Forms\Components\Select::make("doctor")
                    ->options(
                        function ($get) {
                            return Doctor::query()
                                ->where("hospital_id", "=", $get("hospital"))
                                ->get()
                                ->map(
                                    fn($doctor) => [
                                        "id"=>$doctor->id,
                                        "value"=>"{$doctor->name} {$doctor->category->title}"
                                    ]
                                )->pluck("value", "id");
                        }
                    )
                    ->requiredWith("hospital_id")
                    ->disabled(fn($get) => !$get("hospital"))
                    ->live(),


                Forms\Components\Select::make("patient_id")
                    ->required()
                    ->relationship("patient", "name")

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('state')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('appointment_date')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('doctor.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('patient.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('hospital.name')
                    ->sortable()
                    ->searchable(),


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
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}

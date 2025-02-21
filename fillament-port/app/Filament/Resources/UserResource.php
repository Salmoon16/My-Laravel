<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        // ->poll('5s')
            ->columns([
                TextColumn::make('name')
                ->searchable()
                ,
                TextColumn::make('email')
                ->searchable(),
                TextColumn::make('role')
                ->searchable(),
                TextColumn::make('department.name')
                ->searchable(),
                TextColumn::make('generation')
                ->searchable(),
                TextColumn::make('kelas.major')
                ->searchable(),
                TextColumn::make('entry_date')
                ->label('awal - akhir program')
                ->searchable(),
            ])

            ->defaultSort(
                fn($query) =>
                $query->orderBy('generation', 'desc')
            )

            ->paginated([
                10,
                20,
                50,
                100
            ])
            ->filters([
                SelectFilter::make('role')
                ->label('Role')
                ->options([
                    'Admin' => 'admin',
                    'Student' => 'student',
                    'Teacher' => 'teacher',
                ]),

                // SelectFilter::make('department_id')
                // ->('name', 'íd')
                // ->label('Departement'),


                Filter::make('entry_date')
                ->form([
                    DateTimePicker::make('start_date')
                    ->label('Start Date')
                    ->native(false)
                    ->format('Y-m-d'),


                    DateTimePicker::make('end_date')
                    ->label('End Date')
                    ->native(false)
                    ->format('Y-m-d'),
                ])

                ->query(function (Builder $query, array $data) {
                    if (!empty ($data['start_date']) && empty ($data['end_date'])) {
                        $query->whereBetween('entry_date', [
                            $data['start_date'],
                            $data['end_date'],
                        ]);
                    }
                })
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}

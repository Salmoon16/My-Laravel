<?php

namespace App\Filament\Resources;

use DateTime;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Departement;
use App\Models\KelasSantri;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Grouping\Group;
use App\Forms\Components\KelasSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Forms\Components\DepartementSelect;
use App\Forms\Components\EducationStageSelect;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form

        ->schema([
            Grid::make([
                'md' => 1,
                'lg' => 2,
                'xl' => 4,
            ])
                ->schema([
                    ToggleButtons::make('gender')
                    ->inline()
                    ->columnSpanFull()
                    ->grouped()
                    ->options([
                        'male' => 'Laki-laki',
                        'female' => 'Perempuan',
                    ])
                    ->icons([
                        'male' => 'heroicon-o-user',
                        'female' => 'heroicon-o-user-circle',
                    ])

                    ->colors([
                        'male' => 'primary',
                        'female' => 'pink',
                    ]),
                    TextInput::make('name')
                        ->placeholder('Enter your Name')
                        ->prefixIcon('heroicon-o-user')
                        ->prefixIconColor('primary'),
                    TextInput::make('email')
                        ->email()
                        ->prefixIcon('heroicon-o-envelope')
                        ->prefixIconColor('primary'),
                    TextInput::make('password')
                        ->password()
                        ->prefixIcon('heroicon-o-lock-closed')
                        ->prefixIconColor('primary'),
                    TextInput::make('phone')
                        ->tel()
                        ->prefixIcon('heroicon-o-phone')
                        ->prefixIconColor('primary'),
                ]),

            Grid::make([
                'md' => 1,
                'lg' => 2,
                'xl' => 4,
            ])
                ->schema([

                        TextInput::make('nisn')
                            ->numeric()
                            ->columnSpan(1)
                            ->placeholder('Masukan No NISN sekolah mu')
                            ->label('NISN')
                            ->prefixIcon('heroicon-o-credit-card')
                            ->prefixIconColor('primary'),
                        TextInput::make('no_ktp')
                            ->numeric()
                            ->columnSpan(1)
                            ->placeholder('Masukan No NIK KTP')
                            ->label('NIK')
                            ->prefixIcon('heroicon-o-credit-card')
                            ->prefixIconColor('primary'),


                    DatePicker::make('date_of_birth')
                        ->date()
                        ->placeholder('Enter your birth date')
                        ->native(false)
                        ->prefixIcon('heroicon-o-cake')
                        ->prefixIconColor('primary'),
                    Select::make('role')
                        ->placeholder('Pilih role kamu')
                        ->options([
                            'Admin' => 'Admin',
                            'Santri' => 'Santri',
                            'Mentor' => 'Mentor',
                            'Leader' => 'Leader',
                        ])
                        ->prefixIcon('heroicon-o-tag')
                        ->prefixIconColor('primary'),

                ]),

            Grid::make([
                'md' => 1,
                'lg' => 2,
                'xl' => 4,
            ])
                ->schema([
                    TextInput::make('generation')
                    ->numeric()
                    ->prefixIcon('heroicon-o-academic-cap')
                    ->prefixIconColor('primary'),

                    KelasSelect::make('kelas_santri_id'),
                    DepartementSelect::make('department_id') ,
                    EducationStageSelect::make('education_stage_id')
                        ,

                ]),

            Grid::make([
                'md' => 1,
                'lg' => 2,
                'xl' => 4,
            ])
                ->schema([
                    Select::make('status_graduate')
                    ->native(false)
                        ->options([
                            'Lulus' => 'Lulus',
                            'Belum Lulus' => 'Belum Lulus',
                            'Dropout' => 'Dropout',

                        ])
                        ->prefixIcon('heroicon-o-academic-cap')
                        ->prefixIconColor('primary'),

                    DatePicker::make('entry_date')
                        ->native(false)
                        ->prefixIcon('heroicon-o-calendar-date-range')
                        ->prefixIconColor('primary'),


                    DatePicker::make('graduate_date')
                        ->native(false)
                        ->prefixIcon('heroicon-o-calendar-days')
                        ->prefixIconColor('primary'),
                    Textarea::make('address')
                        ->columnSpan(3),

                ]),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // ->poll('5s')
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->icon('heroicon-o-user')
                    ->iconColor('primary')
                    ->description(fn(User $record): string => "" . $record->email)
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query->orderBy('email', $direction);
                    }),

                // TextColumn::make('generation')
                //         ->sortable()
                //         ->badge()
                //         ->label("angkatan")
                //         ->searchable(),

                        TextColumn::make('role')
                    ->badge()
                    ->color(function ($record) {
                        $role = $record->role;
                        if ($role == 'admin') {
                            return 'success';
                        } else {
                            return 'warning';
                        }
                    })
                    ->searchable(),

                    TextColumn::make('department.name')
                    ->label('Amanah Departement')
                    ->icon('heroicon-o-briefcase')
                    ->iconColor('primary')
                    ->searchable(
                        query: function (Builder $query, string $search): Builder {
                                 $id = Departement::where('name', 'like', '%' . $search . '%')->first()->id ?? null;
                            if ($id) {
                                return $query->where('department_id', 'like', '%' . $id . '%');
                            }
                            return $query;
                        }
                    ),

                TextColumn::make('kelas.major')
                    ->iconColor('primary')
                    ->icon('heroicon-o-academic-cap')
                    ->searchable(
                        query: function (Builder $query, string $search): Builder {
                            $id = KelasSantri::where('major', 'like', '%' . $search . '%')->first()->id ?? null;
                            if($id){
                                return $query->where('kelas_id', 'like', '%' . $id . '%');
                            }
                            return $query;
                        }
                    ),

                    TextColumn::make('entry_date')
                    ->sortable()
                    ->tooltip(function ($record) {
                        return $record->entry_date . ' -> ' . $record->graduate_date;
                    })
                    ->getStateUsing(function($record) {
                        $tanggalMasuk = new DateTime($record->entry_date);
                        $tanggalKeluar = new DateTime($record->graduate_date);

                        $totalBulan =
                            $tanggalMasuk->diff($tanggalKeluar)->m +
                            ($tanggalKeluar->format('Y') - $tanggalMasuk->format('Y')) * 12;

                        $tahun = floor($totalBulan / 12);
                        $sisaBulan = $totalBulan % 12;

                        if ($tahun > 0) {
                            if ($sisaBulan > 0) {
                                return $tahun . ' Tahun ' . $sisaBulan . ' Bulan';
                            }
                            return $tahun . ' Tahun';
                        }

                        return $totalBulan . ' Bulan';
                    })

                    ->label('Masa Santri')
                    ->icon('heroicon-o-calendar-date-range')
                    ->iconColor('primary')
                    ->description(fn(User $record): string => "Angkatan " . $record->generation)
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query->orderBy('generation', $direction);
                    }),

                    TextColumn::make('created_at')
                    ->date('Y-m-d')
                    ->sortable()
                    ->label('Created At')
                    ->toggleable(isToggledHiddenByDefault: true),

            ])

            ->defaultSort(
                fn($query) =>
                $query->orderBy('generation', 'desc')
            )
            ->paginated([
                10,
                20,
                40,
                80,
                100,
            ])
            ->filters([
                SelectFilter::make('role')
                    ->label("Role")
                    ->options([
                        'admin' => 'admin',
                        'teacher' => 'teacher',
                        'student' => 'student',
                    ]),
                SelectFilter::make('department_id')
                    ->label("Department")
                    ->searchable()
                    ->preload()
                    ->multiple()
                    ->options(Departement::all()->pluck('name','id')),

                // TernaryFilter::make('email_verified_at')
                //         ->nullable(),

                Filter::make('entry_and_graduate_date')
                        ->form([
                            DatePicker::make('entry_from')
                                ->label('Filter tanggal masuk dari')
                                ->native(false),
                            DatePicker::make('entry_until')
                                ->native(false)
                                ->label('sampai'),
                            DatePicker::make('graduate_from')
                                ->label('Filter tanggal lulus dari')
                                ->native(false),
                            DatePicker::make('graduate_until')
                                ->native(false)
                                ->label('sampai'),
                        ])
                        ->query(function (Builder $query, array $data): Builder {
                            return $query
                                ->when(
                                    $data['entry_from'],
                                    fn (Builder $query, $date): Builder => $query->whereDate('entry_date', '>=', $date),
                                )
                                ->when(
                                    $data['entry_until'],
                                    fn (Builder $query, $date): Builder => $query->whereDate('entry_date', '<=', $date),
                                )
                                ->when(
                                    $data['graduate_from'],
                                    fn (Builder $query, $date): Builder => $query->whereDate('graduate_date', '>=', $date),
                                )
                                ->when(
                                    $data['graduate_until'],
                                    fn (Builder $query, $date): Builder => $query->whereDate('graduate_date', '<=', $date),
                                );
                        })
            ])

            ->groups([
                Group::make('entry_date')
                    ->label('Masa Santri')
                    ->date()
                    ->collapsible(),
                Group::make('department.name')
                    ->label('Department')
                    ->collapsible(),

            ])

            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()->tooltip('Edit'),
                    Tables\Actions\ViewAction::make()->tooltip('View'),
                    Tables\Actions\DeleteAction::make()->tooltip('Delete'),
                ])
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

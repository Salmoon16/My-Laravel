<?php

namespace App\Filament\Resources;

use DateTime;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Teacher;
use App\Models\DataGuru;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\KelasSantri;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use App\Forms\Components\KelasSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ToggleButtons;
use App\Filament\Resources\DataGuruResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DataGuruResource\RelationManagers;
use Filament\Tables\Columns\ImageColumn;

class DataGuruResource extends Resource
{
    protected static ?string $model = Teacher::class;
    protected static ?string $navigationLabel = "Data Guru";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Pondok Management';
    // protected static ?string $slug = 'pengajar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Data Guru')
                        ->icon('heroicon-o-clipboard-document')
                        ->completedIcon('heroicon-m-clipboard-document-check')
                        ->columns(4)
                        ->schema([
                            Section::make()
                                ->description('Pengajar Information')
                                ->schema([
                                    Grid::make([
                                        'md' => 1,
                                        'lg' => 2,
                                        'xl' => 4,
                                    ])->schema([
                                        ToggleButtons::make('gender')
                                            ->inline()
                                            ->columnSpanFull()
                                            ->grouped()
                                            ->options([
                                                'Laki-Laki' => 'Laki-laki',
                                                'Perempuan' => 'Perempuan',
                                            ])
                                            ->icons([
                                                'Laki-Laki' => 'heroicon-o-user',
                                                'Perempuan' => 'heroicon-o-user-circle',
                                            ])

                                            ->colors([
                                                'Laki-Laki' => 'primary',
                                                'Perempuan' => 'pink',
                                            ]),

                                        TextInput::make('name')
                                            ->placeholder('Enter your Name')
                                            ->reactive()
                                            ->required()
                                            ->prefixIcon('heroicon-o-user')
                                            ->prefixIconColor('primary'),

                                        TextInput::make('nip')
                                            ->placeholder('Enter your NIP')
                                            ->reactive()
                                            ->required()
                                            ->prefixIcon('heroicon-o-credit-card')
                                            ->label('NIP')
                                            ->numeric(),
                                        TextInput::make('phone')
                                            ->placeholder('Enter your active WA number')
                                            ->tel()
                                            ->prefixIcon('heroicon-o-phone')
                                            ->prefixIconColor('primary'),
                                    ]),

                                    Grid::make([
                                        'md' => 1,
                                        'lg' => 2,
                                        'xl' => 4,
                                    ])->schema([
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
                                                'Mentor' => 'Mentor',
                                                'Ustadz' => 'Ustadz',
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
                                            KelasSelect::make('kelas_santri_id'),
                                            FileUpload::make('profile')
                                                ->image()
                                                ->directory('teachers')
                                                ->label('Profile Picture'),
                                        ]),
                                    Grid::make([
                                        'md' => 1,
                                        'lg' => 2,
                                        'xl' => 4,
                                    ])
                                        ->schema([
                                            DatePicker::make('entry_date')
                                                ->label('Tanggal awal masuk pondok')
                                                ->native(false)
                                                ->prefixIcon('heroicon-o-calendar-date-range')
                                                ->prefixIconColor('primary'),

                                            DatePicker::make('graduate_date')
                                                ->native(false)
                                                ->label('Tanggal akihr keluar pondok')
                                                ->prefixIcon('heroicon-o-calendar-days')
                                                ->prefixIconColor('primary'),
                                        ]),
                                    Grid::make([
                                        'md' => 1,
                                        'lg' => 2,
                                        'xl' => 4,
                                    ])->schema([
                                        Textarea::make('address')
                                            ->columnSpan(3),
                                    ])
                                ])
                        ]),
                    Wizard\Step::make('Data Ortu Santri')
                        ->icon('heroicon-o-clipboard-document-list')
                        ->completedIcon('heroicon-m-clipboard-document-check')
                        ->columns(4)
                        ->schema([
                            Grid::make()
                                ->relationship('family')
                                ->schema([
                                    Section::make()
                                        ->description("Santri's Family Information")
                                        ->schema([
                                            TextInput::make('no_kk')
                                                ->label('Nomor Kartu Keluarga')
                                                ->placeholder('Enter Family Card Number')
                                                ->prefixIcon('heroicon-o-identification')
                                                ->prefixIconColor('primary'),
                                        ]),
                                    Section::make()
                                        ->description("Father Information")
                                        ->schema([
                                            Grid::make([
                                                'md' => 1,
                                                'lg' => 2,
                                                'xl' => 4,
                                            ])
                                                ->schema([
                                                    TextInput::make('father_name')
                                                        ->label("Father's Name")
                                                        ->placeholder('Enter Father Name')
                                                        ->prefixIcon('heroicon-o-user')
                                                        ->prefixIconColor('primary'),
                                                    TextInput::make('father_job')
                                                        ->label("Father's Job")
                                                        ->placeholder('Enter Father Job')
                                                        ->prefixIcon('heroicon-o-briefcase')
                                                        ->prefixIconColor('primary'),
                                                    DatePicker::make('father_birth')
                                                        ->label("Father's Birth Date")
                                                        ->native(false)
                                                        ->prefixIcon('heroicon-o-calendar')
                                                        ->prefixIconColor('primary'),
                                                    TextInput::make('father_phone')
                                                        ->label("Father's Phone")
                                                        ->placeholder('Enter Father Phone Number')
                                                        ->tel()
                                                        ->prefixIcon('heroicon-o-phone')
                                                        ->prefixIconColor('primary'),
                                                ])
                                        ]),
                                    Section::make()
                                        ->description("Mother Information")
                                        ->schema([
                                            Grid::make([
                                                'md' => 1,
                                                'lg' => 2,
                                                'xl' => 4,
                                            ])
                                                ->schema([
                                                    TextInput::make('mother_name')
                                                        ->label("Mother's Name")
                                                        ->placeholder('Enter Mother Name')
                                                        ->prefixIcon('heroicon-o-user')
                                                        ->prefixIconColor('primary'),
                                                    TextInput::make('mother_job')
                                                        ->label("Mother's Job")
                                                        ->placeholder('Enter Mother Job')
                                                        ->prefixIcon('heroicon-o-briefcase')
                                                        ->prefixIconColor('primary'),
                                                    DatePicker::make('mother_birth')
                                                        ->label("Mother's Birth Date")
                                                        ->native(false)
                                                        ->prefixIcon('heroicon-o-calendar')
                                                        ->prefixIconColor('primary'),
                                                    TextInput::make('mother_phone')
                                                        ->label("Mother's Phone")
                                                        ->placeholder('Enter Mother Phone Number')
                                                        ->tel()
                                                        ->prefixIcon('heroicon-o-phone')
                                                        ->prefixIconColor('primary'),
                                                ]),
                                        ])
                                ]),
                        ]),
                ])
                    ->skippable()
                    ->columnSpanFull()
                    ->contained(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->icon('heroicon-o-user')
                    ->iconColor('primary'),
                TextColumn::make('role')
                    ->badge()
                    ->icon('heroicon-o-shield-check')
                    ->color(function ($record) {
                        $role = $record->role;
                        if ($role == 'Mentor') {
                            return 'sky';
                        } else {
                            return 'info';
                        }
                    })
                    ->searchable(),
                TextColumn::make('kelas.major')
                    ->iconColor('primary')
                    ->icon('heroicon-o-academic-cap')
                    ->searchable(
                        query: function (Builder $query, string $search): Builder {
                            $id = KelasSantri::where('major', 'like', '%' . $search . '%')->first()->id ?? null;
                            if ($id) {
                                return $query->where('kelas_santri_id', 'like', '%' . $id . '%');
                            }
                            return $query;
                        }
                    ),
                ImageColumn::make('profile')
                    ->width(100)
                    ->circular()
                    ->height(100),
                TextColumn::make('entry_date')
                    ->sortable()
                    ->tooltip(function ($record) {
                        return $record->entry_date . ' -> ' . $record->graduate_date;
                    })
                    ->getStateUsing(function ($record) {
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

                    ->label('Masa Pengajaran')
                    ->icon('heroicon-o-calendar-date-range')
                    ->iconColor('primary'),

                TextColumn::make('created_at')
                    ->date('Y-m-d')
                    ->sortable()
                    ->label('Created At')
                    ->toggleable(isToggledHiddenByDefault: true),

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
            'index' => Pages\ListDataGurus::route('/'),
            'create' => Pages\CreateDataGuru::route('/create'),
            'edit' => Pages\EditDataGuru::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Providers\Filament;

use Filament\Enums\ThemeMode;
use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Notifications\Notification;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Monzer\FilamentEmailVerificationAlert\EmailVerificationAlertPlugin;


class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->registration()
            ->passwordReset()
            ->emailVerification()
            ->profile()
            ->colors([
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Yellow,
                'primary' => Color::Teal,
                'success' => Color::Green,
                'warning' => Color::Orange,
                // Warna tambahan
                'slate' => Color::Slate,
                'zinc' => Color::Zinc,
                'neutral' => Color::Neutral,
                'stone' => Color::Stone,
                'red' => Color::Red,
                'orange' => Color::Orange,
                'yellow' => Color::Yellow,
                'green' => Color::Green,
                'blue' => Color::Blue,
                'amber' => Color::Amber,
                'lime' => Color::Lime,
                'emerald' => Color::Emerald,
                'teal' => Color::Teal,
                'cyan' => Color::Cyan,
                'sky' => Color::Sky,
                'indigo' => Color::Indigo,
                'violet' => Color::Violet,
                'purple' => Color::Purple,
                'fuchsia' => Color::Fuchsia,
                'pink' => Color::Pink,
                'rose' => Color::Rose,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])

            ->defaultThemeMode(ThemeMode::Dark)
            ->spa()
            ->sidebarWidth('15rem')
            ->maxContentWidth('25rem')
            ->sidebarCollapsibleOnDesktop(true)
            ->sidebarFullyCollapsibleOnDesktop(true)
            ->brandLogo(asset('images/1.png'))
            ->darkModeBrandLogo(asset('images/2.png'))
            ->favicon(asset('images/3.png'))
            ->brandName('Salimin')
            ->brandLogoHeight('5rem')

            ->plugins([
                EmailVerificationAlertPlugin::make()
                    ->color('blue')
                    ->persistClosedState()
                    ->closable(true)
                    ->placeholder(true)
                    ->renderHookName('panels::body.start')
                    // ->renderHookScopes([ListUsers::class])
                    ->lazy(false)
                    ->verifyUsing(function ($user) {

                        // $user->notify(new EmailVerificationPrompt);

                        Notification::make()
                            ->title(trans('filament-email-verification-alert::messages.verification.success'))
                            ->success()
                            ->send();
                    }),
            ]);
    }
}

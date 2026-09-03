<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class DashboardHeaderWidget extends Widget
{
    protected string $view = 'filament.widgets.dashboard-header';

    protected static ?int $sort = -3;

    protected int | string | array $columnSpan = 'full';

    public function getUser()
    {
        return auth()->user();
    }
}

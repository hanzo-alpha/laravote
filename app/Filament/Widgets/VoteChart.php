<?php

namespace App\Filament\Widgets;

use App\Models\Vote;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class VoteChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'voteChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Statistik Voting';

    public ?string $filter = 'today';
    protected static ?string $pollingInterval = '10s';
    protected static ?string $loadingIndicator = 'Sedang mengambil data...';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $title = $this->filterFormData['title'];
        $dateStart = $this->filterFormData['date_start'];
        $dateEnd = $this->filterFormData['date_end'];
        $activeFilter = $this->filter;
        //showing a loading indicator immediately after the page load
        if (!$this->readyToLoad) {
            return [];
        }

        //slow query
        sleep(2);

        $vote = Vote::query()
//            ->when($dateStart, function ($data) use ($dateStart, $dateEnd) {
//                return $data->whereBetween('created_at', [$dateStart, $dateEnd]);
//            })
            ->when($activeFilter, function ($data) use ($activeFilter) {
                if ($activeFilter === 'today') {
                    return $data->whereDay('created_at', now());
                }

                if ($activeFilter === 'week') {
                    return $data->where('created_at', Carbon::now()->week);
                }

                if ($activeFilter === 'month') {
                    return $data->whereMonth('created_at', Carbon::now()->month);
                }

                return $data->whereYear('created_at', Carbon::now()->year);
            })
            ->get();

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'BasicBarChart',
                    'data' => [7, 10, 13, 15, 18],
                ],
            ],
            'xaxis' => [
                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'colors' => ['#6366f1'],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 0,
                    'horizontal' => false,
                ],
            ],
        ];
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Hari Ini',
            'week' => 'Minggu Lalu',
            'month' => 'Bulan Lalu',
            'year' => 'Tahun Ini',
        ];
    }

    protected function getFormSchema(): array
    {
        return [

            TextInput::make('title')
                ->default('My Chart'),

            DatePicker::make('date_start')
                ->default(now()),

            DatePicker::make('date_end')
                ->default(now())

        ];
    }
}

<?php

namespace App\Providers;

use App\Repository\EloquentSeriesRepository;
use App\Repository\SeriesRepository;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        SeriesRepository::class => EloquentSeriesRepository::class
    ];

}

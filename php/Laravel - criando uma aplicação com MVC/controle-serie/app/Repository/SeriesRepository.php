<?php

namespace App\Repository;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;

interface SeriesRepository
{
    public function add(SeriesFormRequest $request): Series;
}

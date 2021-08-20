<?php

namespace Wimando\LaravelMoodle\Facades;

use Illuminate\Support\Facades\Facade;
use Wimando\LaravelMoodle\Services\Course;

class CourseService extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Course::class;
    }
}

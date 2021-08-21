<?php

namespace Wimando\LaravelMoodle\Facades;

use Illuminate\Support\Facades\Facade;
use Wimando\LaravelMoodle\Entities\CourseCollection;
use Wimando\LaravelMoodle\Services\Course;

/**
 * @method static CourseCollection getAll()
 */
class CourseService extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Course::class;
    }
}

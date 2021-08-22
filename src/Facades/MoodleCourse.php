<?php

namespace Wimando\LaravelMoodle\Facades;

use Illuminate\Support\Facades\Facade;
use Wimando\LaravelMoodle\Clients\Adapters\RestClient;
use Wimando\LaravelMoodle\Entities\CourseCollection;
use Wimando\LaravelMoodle\Services\Course;

/**
 * @method static CourseCollection getAll(RestClient $client)
 */
class MoodleCourse extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Course::class;
    }
}

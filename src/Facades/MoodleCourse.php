<?php

namespace Wimando\LaravelMoodle\Facades;

use Illuminate\Support\Facades\Facade;
use Wimando\LaravelMoodle\Clients\ClientAdapterInterface;
use Wimando\LaravelMoodle\Entities\CourseCollection;
use Wimando\LaravelMoodle\Services\Course;

/**
 * @method static Course setClient(ClientAdapterInterface $client)
 * @method static CourseCollection getAll()
 */
class MoodleCourse extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Wimando\LaravelMoodle\Services\Course::class;
    }
}

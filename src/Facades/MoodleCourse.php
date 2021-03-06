<?php

namespace Wimando\LaravelMoodle\Facades;

use Illuminate\Support\Facades\Facade;
use Wimando\LaravelMoodle\Clients\ClientAdapterInterface;
use Wimando\LaravelMoodle\Entities\Dto\Course as CourseDto;
use Wimando\LaravelMoodle\Resources\CourseCompletionResource;
use Wimando\LaravelMoodle\Resources\CourseResourceCollection;
use Wimando\LaravelMoodle\Resources\EnrolmentMethodResourceCollection;
use Wimando\LaravelMoodle\Resources\GroupResourceCollection;
use Wimando\LaravelMoodle\Services\CourseService;

/**
 * @method static CourseService setClient(ClientAdapterInterface $client)
 * @method static CourseResourceCollection getAll(array $ids = [])
 * @method static CourseResourceCollection getByField(string $field, string $value)
 * @method static GroupResourceCollection getCourseGroups(int $moodleCourseId)
 * @method static CourseCompletionResource getCourseCompletionStatus(int $moodleCourseId, int $moodleUserId)
 * @method static CourseResourceCollection create(CourseDto ...$courses)
 * @method static EnrolmentMethodResourceCollection getEnrolmentMethods(int $moodleCourseId)
 * @method static mixed delete(array $ids = [])
 */
class MoodleCourse extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Wimando\LaravelMoodle\Services\CourseService::class;
    }
}

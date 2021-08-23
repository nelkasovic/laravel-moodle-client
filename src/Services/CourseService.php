<?php

namespace Wimando\LaravelMoodle\Services;

use App\Facades\Services\MoodleService;
use Wimando\LaravelMoodle\Entities\Dto\Course as CourseDto;
use Wimando\LaravelMoodle\Resources\CourseResourceCollection;
use Wimando\LaravelMoodle\Resources\GroupResourceCollection;

class CourseService extends Service
{

    public function getAll(array $ids = []): CourseResourceCollection
    {
        $response = $this->sendRequest('core_course_get_courses', ['options' => ['ids' => $ids]]);

        return CourseResourceCollection::make($response);
    }

    public function getByField(string $field, string $value): CourseResourceCollection
    {
        $arguments = [
            'field' => $field,
            'value' => $value,
        ];

        $response = $this->sendRequest('core_course_get_courses_by_field', $arguments);

        return CourseResourceCollection::make($response['courses']);
    }

    public function getCourseGroups(int $moodleCourseId): GroupResourceCollection
    {
        $arguments = ['courseid' => $moodleCourseId];

        $response = $this->sendRequest('core_group_get_course_groups', $arguments);

        return GroupResourceCollection::make($response);
    }

    public function create(CourseDto ...$courses): CourseResourceCollection
    {
        $response = $this->sendRequest(
            'core_course_create_courses',
            [
                'courses' => $this->prepareEntityForSending(...$courses)
            ]
        );

        return CourseResourceCollection::make($response);
    }

    public function delete(array $ids = []): array
    {
        return $this->sendRequest('core_course_delete_courses', ['courseids' => $ids]);
    }
}

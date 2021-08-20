<?php

namespace Wimando\LaravelMoodle\Services;

use Wimando\LaravelMoodle\Entities\Course as CourseItem;
use Wimando\LaravelMoodle\Entities\CourseCollection;
use Wimando\LaravelMoodle\Entities\Dto\Course as CourseDto;

class Course extends Service
{

    public function getAll(array $ids = []): CourseCollection
    {
        $response = $this->sendRequest('core_course_get_courses', ['options' => ['ids' => $ids]]);

        return $this->getCourseCollection($response);
    }

    public function getByField(string $field, string $value): CourseCollection
    {
        $arguments = [
            'field' => $field,
            'value' => $value,
        ];

        $response = $this->sendRequest('core_course_get_courses_by_field', $arguments);

        return $this->getCourseCollection($response['courses']);
    }

    public function create(CourseDto ...$courses): CourseCollection
    {
        $response = $this->sendRequest(
            'core_course_create_courses',
            [
                'courses' => $this->prepareEntityForSending(...$courses)
            ]
        );

        return $this->getCourseCollection($response);
    }

    /**
     * @return mixed
     */
    public function delete(array $ids = [])
    {
        return $this->sendRequest('core_course_delete_courses', ['courseids' => $ids]);
    }

    protected function getCourseCollection(array $courses): CourseCollection
    {
        $courseItems = [];
        foreach ($courses as $courseItem) {
            $courseItems[] = new CourseItem($courseItem);
        }

        return new CourseCollection(...$courseItems);
    }
}

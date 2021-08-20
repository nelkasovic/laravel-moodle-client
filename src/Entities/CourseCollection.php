<?php

namespace Wimando\LaravelMoodle\Entities;

use Wimando\LaravelMoodle\GenericCollection;

class CourseCollection extends GenericCollection
{

    public function __construct(Course ...$courses)
    {
        $this->items = $courses;
    }

    public function add(Course $course)
    {
        $this->items[$course->getId()] = $course;
    }

    public function remove(Course $course)
    {
        if (array_key_exists($course->getId(), $this->items)) {
            unset($this->items[$course->getId()]);
        }
    }
}

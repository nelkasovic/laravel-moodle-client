<?php

namespace Wimando\LaravelMoodle\Tests\Services;

use Assert\AssertionFailedException;
use Wimando\LaravelMoodle\Clients\Adapters\RestClient;
use Wimando\LaravelMoodle\Clients\ClientAdapterInterface;
use Wimando\LaravelMoodle\Entities\Course as CourseEntity;
use Wimando\LaravelMoodle\Entities\CourseCollection;
use Wimando\LaravelMoodle\Entities\Dto\Course as CourseDto;
use Wimando\LaravelMoodle\Resources\CourseResourceCollection;
use Wimando\LaravelMoodle\Services\CourseService;
use Wimando\LaravelMoodle\Tests\MoodleTestCase;

class CourseTest extends MoodleTestCase
{

    protected ClientAdapterInterface $client;

    protected CourseService $service;

    /**
     * @throws AssertionFailedException
     */
    public function setUp()
    {
        parent::setUp();

        $this->client = new RestClient($this->getConnection(), 'token');
        $this->service = new CourseService($this->client);
    }

    public function testGetAll()
    {
        $allCourses = $this->service->getAll();

        $courseDto = new CourseDto();
        $properties = $courseDto->getProperties();

        /** @var CourseEntity $course */
        foreach ($allCourses as $course) {
            foreach ($properties as $property => $value) {
                $courseData = $course->toArray();
                $this->assertArrayHasKey($property, $courseData);
            }
        }
    }


    public function testCreate(): CourseResourceCollection
    {
        $courseDto = $this->buildCourse();
        $createdCourses = $this->service->create($courseDto);

        /** @var CourseEntity $course */
        foreach ($createdCourses as $course) {
            $courseData = $course->toArray();
            $this->assertArrayHasKey('id', $courseData);
            $this->assertEquals($course->shortName, $courseDto->shortName);
        }

        return $createdCourses;
    }

    /**
     * @param CourseCollection $courses
     * @depends testCreate
     */
    public function testGetByField(CourseCollection $courses)
    {
        $createdCourses = $courses->toArray();

        /** @var CourseEntity $course */
        $createdCourse = $createdCourses[0];

        $allCourses = $this->service->getByField('shortname', $createdCourse->shortName);

        foreach ($allCourses as $course) {
            $this->assertEquals($createdCourse->shortName, $course->shortName);
        }
    }

    /**
     * @param CourseCollection
     * @depends testCreate
     */
    public function testDelete($courses)
    {
        $ids = [];
        /** @var CourseEntity $course */
        foreach ($courses as $course) {
            $ids[] = $course->id;
        }

        $this->service->delete($ids);
        $courses = $this->service->getAll($ids);

        $this->assertEquals(CourseResourceCollection::make([]), $courses);
    }

    /**
     * @return CourseDto
     */
    protected function buildCourse(): CourseDto
    {
        $courseDto = new CourseDto();
        $courseDto->shortName = 'shortName_' . uniqid();
        $courseDto->fullName = 'fullName_' . uniqid();
        $courseDto->categoryId = 1;

        return $courseDto;
    }
}

<?php

namespace Wimando\LaravelMoodle\Services;

use Illuminate\Support\Arr;
use Wimando\LaravelMoodle\Resources\GroupResource;
use Wimando\LaravelMoodle\Resources\GroupResourceCollection;
use Wimando\LaravelMoodle\Resources\UserResourceCollection;

class GroupService extends Service
{
    public function getById(int $moodleGroupId): GroupResource
    {
        $arguments = ['groupids' => $moodleGroupId];

        $response = $this->sendRequest('core_group_get_groups', $arguments);

        return GroupResource::make(Arr::first($response));
    }

    public function getCourseGroups(int $moodleCourseId): GroupResourceCollection
    {
        $arguments = ['courseid' => $moodleCourseId];

        $response = $this->sendRequest('core_group_get_course_groups', $arguments);

        return GroupResourceCollection::make($response);
    }

    public function getGroupMembers(int $moodleGroupId): UserResourceCollection
    {
        $arguments = ['groupids' => [$moodleGroupId]];
        $response = $this->sendRequest('core_group_get_group_members', $arguments);

        return UserResourceCollection::make($response);
    }

    public function delete(array $ids = []): GroupResourceCollection
    {
        $response = $this->sendRequest('core_group_delete_groups', ['groupids' => $ids]);

        return GroupResourceCollection::make($response);
    }
}

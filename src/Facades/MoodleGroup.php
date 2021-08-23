<?php

namespace Wimando\LaravelMoodle\Facades;

use Illuminate\Support\Facades\Facade;
use Wimando\LaravelMoodle\Clients\ClientAdapterInterface;
use Wimando\LaravelMoodle\Resources\GroupResource;
use Wimando\LaravelMoodle\Resources\GroupResourceCollection;
use Wimando\LaravelMoodle\Resources\UserResourceCollection;
use Wimando\LaravelMoodle\Services\GroupService;

/**
 * @method static GroupService setClient(ClientAdapterInterface $client)
 * @method static GroupResource getById(int $moodleGroupId)
 * @method static GroupResourceCollection getCourseGroups(int $moodleCourseId)
 * @method static UserResourceCollection getGroupMembers(int $moodleGroupId)
 * @method static GroupResourceCollection delete(array $ids = [])
 */
class MoodleGroup extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Wimando\LaravelMoodle\Services\GroupService::class;
    }
}

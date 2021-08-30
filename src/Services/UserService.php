<?php

namespace Wimando\LaravelMoodle\Services;

use Wimando\LaravelMoodle\Resources\UserResourceCollection;

class UserService extends Service
{
    public function getAll(): UserResourceCollection
    {
        $arguments = [
            'field' => 'email',
            'values' => [],
        ];

        $response = $this->sendRequest('core_user_get_users_by_field', $arguments);

        return UserResourceCollection::make($response);
    }

    public function getByField(string $field, array $values = []): UserResourceCollection
    {
        $arguments = [
            'field' => $field,
            'values' => $values,
        ];

        $response = $this->sendRequest('core_user_get_users_by_field', $arguments);

        return UserResourceCollection::make($response);
    }

    public function updateUsers(array $usersWithData): UserResourceCollection
    {
        $arguments = [
            'users' => [$usersWithData],
        ];

        $response = $this->sendRequest('core_user_update_users', $arguments);

        return UserResourceCollection::make($response);
    }
}

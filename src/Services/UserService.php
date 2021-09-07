<?php

namespace Wimando\LaravelMoodle\Services;

use Wimando\LaravelMoodle\Resources\UserResourceCollection;

class UserService extends Service
{
    /**
     * Example: search(['key' => 'email', 'value' => '%email.com']);
     * Search for a user by providing key (column) and value. Values can not be empty.
     * Specify different keys only once (fullname => 'user1', auth => 'manual', ...) -
     * The search is executed with AND operator on the criterias. Invalid criterias (keys) are ignored,
     * the search is still executed on the valid criterias.
     * You can search without criteria, but the function is not designed for it.
     * It could very slow or timeout. The function is designed to search some specific users.
     *
     * key: string (the user column to search).
     * value: string (the value to search).
     *
     * Expected keys (value format) are:
     * - "id" (int) matching user id,
     * - "lastname" (string) user last name (Note: you can use % for searching but it may be considerably slower!),
     * - "firstname" (string) user first name (Note: you can use % for searching but it may be considerably slower!),
     * - "idnumber" (string) matching user idnumber,
     * - "username" (string) matching user username,
     * - "email" (string) user email (Note: you can use % for searching but it may be considerably slower!),
     * - "auth" (string) matching user auth plugin
     */
    public function search(array $criteria): UserResourceCollection
    {
        $arguments = [
            'criteria' => [$criteria]
        ];

        $response = $this->sendRequest('core_user_get_users', $arguments);

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

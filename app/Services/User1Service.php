<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class User1Service{

    use ConsumesExternalService;

    /**
     * The base uri to consume the User1 Service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the User1 Service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.users1.base_uri');
        $this->secret = config('services.users1.secret');
    }
    

    /**
     * Obtain the full list of Users from User1 Site
     * @return string
     */
    public function obtainUsers()
    {
        return $this->performRequest('GET','/users');
    }

    /**
     * Create one user using the User1 service
     * @return string
     */
    public function createUser($data)
    {
        return $this->performRequest('POST', '/users', $data);
    }

    /**
     * Obtain one single user from the User1 service
     * @return string
     */
    public function obtainUser($id)
    {
        return $this->performRequest('GET', "/users/{$id}");
    }

      /**
     * Obtain one single user from the User1 service
     * @return string
     */
    public function obtainUserJob($id)
    {
        return $this->performRequest('GET', "/userjob/{$id}");
    }

    /**
     * Update an instance of user1 using the User1 service
     * @return string
     */
    public function editUser($data, $id)
    {
        return $this->performRequest('PUT', "/users/{$id}", $data);
    }

    /**
     * Remove a single user using the User1 service
     * @return string
     */
    public function deleteUser($id)
    {
        return $this->performRequest('DELETE', "/users/{$id}");
    }

}
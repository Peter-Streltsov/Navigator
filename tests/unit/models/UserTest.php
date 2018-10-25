<?php

namespace tests\models;

use app\models\identity\Users;
use Codeception\Test\Unit;

class UserTest extends Unit
{
    public function testFindUserById()
    {
        expect_that($user = Users::findIdentity(1));
        expect($user->name)->equals('admin');

        expect_not(Users::findIdentity(999));
    }

    public function testFindUserByAccessToken()
    {
        expect_that($user = Users::findIdentityByAccessToken('supervisor'));
        expect($user->username)->equals('admin');

        expect_not(Users::findIdentityByAccessToken('non-existing'));
    }

    public function testFindUserByUsername()
    {
        expect_that($user = Users::findByUsername('admin'));
        expect_not(Users::findByUsername('not-admin'));
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $user = Users::findByUsername('admin');
        expect_that($user->validateAuthKey(null));
        expect_not($user->validateAuthKey('test102key'));

        //expect_that($user->validatePassword('admin'));
        //expect_not($user->validatePassword('123456'));
    }

}

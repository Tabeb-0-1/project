<?php

namespace WiseChain\model;

use WiseChain\core\Application;

class User extends DataModel
{
    public string $Username = '';
    public string $Password = '';
    public static function tableName(): string
    {
        return 'Users';
    }
    public static function primaryKey(): string
    {
        return 'UserId';
    }
    public static function attributes(): array
    {
        return ['Username', 'Password'];
    }
    public function rules(): array
    {
        return [
            'Username' =>
                [
                    self::RULE_REQUIRED,
                    [self::RULE_MIN, 'min' => 3],
                    [self::RULE_MAX, 'max' => 18]
                ],
            'Password' => [self::RULE_REQUIRED]
        ];
    }
    public function login(): bool
    {
        $user = user::findOne(['Username' => $this->Username]);

        if (!$user){
            $this->addError('Username', Application::$app->language->dictionary['Error_Username']);
            return false;
        }
        if (sha1($this->Password) !== $user->Password){
            $this->addError('Password', Application::$app->language->dictionary['Error_Password']);
            return false;
        }




        return Application::$app->login($user);
    }
    public function getDisplayName(): string
    {
        return $this->Username;
    }
}
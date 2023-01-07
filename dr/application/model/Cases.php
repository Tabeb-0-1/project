<?php

namespace WiseChain\model;

class Cases extends DataModel
{

    public static function tableName(): string
    {
        return 'Cases';
    }

    public static function primaryKey(): string
    {
        return 'ID';
    }

    public static function attributes(): array
    {
        return ['ID', 'Name', 'Contact', 'UserID', 'Date'];
    }

    public function rules(): array
    {
        // TODO: Implement rules() method.
    }
}
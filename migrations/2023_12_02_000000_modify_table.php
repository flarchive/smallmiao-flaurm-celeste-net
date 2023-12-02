<?php

use Illuminate\Database\Schema\Blueprint;

use Flarum\Database\Migration;

return Migration::addColumns(
    'users',
    [
        'prefix' => ['string', 'length' => 255, 'nullable' => true],
        'color' => ['string', 'length' => 255, 'nullable' => true,'default'=>'#FFFFFF'],
        'isBanned' => ['boolean', 'default' => false],
    ]
);


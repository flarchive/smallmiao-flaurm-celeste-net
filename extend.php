<?php

/*
 * This file is part of smallmiao/flaurm-celeste-net.
 *
 * Copyright (c) 2023 Small_Miao.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SmallMiao\Tools;

use SmallMiao\Tools\Controllers\ApiUserController;
use Flarum\Api\Serializer\UserSerializer;
use Flarum\Extend;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/less/forum.less'),
    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js')
        ->css(__DIR__.'/less/admin.less'),
    new Extend\Locales(__DIR__.'/locale'),
    (new Extend\ApiSerializer(UserSerializer::class))
    ->attribute('prefix', function (UserSerializer $serializer, $user, $attributes) {
        return $user->prefix;
    })
    ->attribute('color', function (UserSerializer $serializer, $user, $attributes) {
        return $user->color;
    })
    ->attribute('isBanned',function (UserSerializer $serializer, $user, $attributes) {
        return $user->isBanned;
    }),
    (new Extend\Routes('api'))
    ->get('/celeste/user', 'flaurm-celeste-net.api.user', ApiUserController::class)
];

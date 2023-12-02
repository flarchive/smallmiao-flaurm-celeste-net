<?php
namespace SmallMiao\Tools\Controllers;

use Flarum\User\User;
use Flarum\Http\RequestUtil;
use Illuminate\Support\Arr;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\JsonResponse;
use Flarum\Settings\SettingsRepositoryInterface;
use Flarum\Group\Group;

class ApiUserController implements RequestHandlerInterface
{
    protected $settings;
    public function __construct(SettingsRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $actor = RequestUtil::getActor($request);
        $actor = $actor->toArray();
        $data = [
            'id' => $actor['id'],
            'username' => $actor['username'],
            'avatar_url' => $actor['avatar_url'],
            'is_email_confirmed' => $actor['is_email_confirmed'],
            'prefix' => $actor['prefix'],
            'color' => $actor['color'],
            'isBanned' => $actor['isBanned'],
        ];
        return new JsonResponse($data);
    }
}
<?php

namespace App\Controllers\User;

use App\Adapters\Mysql;
use App\UseCases\Repositories\UserRepository;
use App\UseCases\User\ListUseCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ListUserController
{
    protected ListUseCase $listUseCase;
    protected Mysql $mysql;
    protected UserRepository $userRepository;
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->userRepository = new UserRepository($this->mysql);
        $this->listUseCase = new ListUseCase($this->userRepository);
    }

    /**
     * @throws \Exception
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
       try {
           $users = $this->listUseCase->execute();
           $response->getBody()->write(json_encode($users));
           return $response;
       } catch (\Exception $e) {
           throw new \Exception($e->getMessage(), $e->getCode(), $e);
       }
    }
}

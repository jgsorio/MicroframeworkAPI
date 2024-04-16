<?php

namespace App\UseCases\User;


use App\Domain\Repositories\UserRepositoryInterface;
use Exception;

class ListUseCase
{
    public function __construct(protected UserRepositoryInterface $userRepository){}

    /**
     * @throws Exception
     */
    public function execute(): array
    {
        try {
            return $this->userRepository->listAll();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
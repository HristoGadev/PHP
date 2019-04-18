<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/18/2019
 * Time: 9:28 AM
 */

namespace App\Service;


use App\Data\UserDTO;
use App\Repository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserDTO $userDTO): bool
    {
        if ($this->userRepository->findOneByName($userDTO->getUsername()) !== null) {
            return false;
        }

        $this->encryptPass($userDTO);

        return $this->userRepository->insert($userDTO);

    }

    private function encryptPass(UserDTO $userDTO)
    {
        $plainPass = $userDTO->getPassword();
        $hashPass = password_hash($plainPass, PASSWORD_DEFAULT);
        $userDTO->setPassword($hashPass);
    }

    public function login(string $username, string $password): ?UserDTO
    {

        $currentUser = $this->userRepository->findOneByName($username);

        if ($currentUser === null) {
            return null;
        }

        $userPassHash = $currentUser->getPassword();

        if (password_verify($password, $userPassHash)) {
            return $currentUser;
        }
        return null;
    }

    public function currentUser(): ?UserDTO
    {
        if (!isset($_SESSION['id'])) {
            return null;
        }
        return $this->userRepository->findOneById($_SESSION['id']);
    }

    public function forgottenPassword(string $username): ?UserDTO
    {
        $currentUser = $this->userRepository->findOneByName($username);

        if($currentUser==null){
            return null;
        }
        return $currentUser;
    }

    public function editPassword(UserDTO $userDTO): void
    {

        $this->encryptPass($userDTO);
        $this->userRepository->updateUser($_SESSION['id'], $userDTO);
    }
}

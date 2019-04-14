<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/6/2019
 * Time: 5:14 PM
 */

namespace App\Service;


use App\Data\UserDTO;
use App\Repository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    private $userRepository;

    /**
     * UserService constructor.
     * @param $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    function register(UserDTO $userDTO, string $confirmPassword): bool
    {
        if ($userDTO->getPassword() !== $confirmPassword) {
            return false;
        }

        if ($this->userRepository->findOneByName($userDTO->getFirstName()) !== null) {
            return false;
        }

        $this->encryptPass($userDTO);

        return $this->userRepository->insert($userDTO);
    }

    function login(string $username, string $password): ?UserDTO
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


    public function editUser(UserDTO $userDTO): bool
    {
        $currentUser = $this->userRepository->findOneByName($userDTO->getUsername());

        if ($currentUser !== null) {
            return false;
        }
        $this->encryptPass($userDTO);
        return $this->userRepository->updateUser($_SESSION['id'], $userDTO);

    }

    /**
     * @param UserDTO $userDTO
     */
    public function encryptPass(UserDTO $userDTO): void
    {
        $plaintText = $userDTO->getPassword();
        $passwordHash = password_hash($plaintText, PASSWORD_DEFAULT);
        $userDTO->setPassword($passwordHash);
    }

    /** @var \Generator|UserDto[] */
    public function getAll(): \Generator
    {
       return $this->userRepository->findAll();
    }
}
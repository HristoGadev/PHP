<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/18/2019
 * Time: 9:28 AM
 */

namespace App\Service;


use App\Data\PictureDTO;
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
        if (strlen($userDTO->getPassword()) < 8) {
            return false;
        }
        $this->encryptPass($userDTO);

        return $this->userRepository->insert($userDTO);

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

        if ($currentUser == null) {
            return null;
        }
        return $currentUser;
    }

    public function editPassword(UserDTO $userDTO, string $password): void
    {
        $this->encryptPass($userDTO);

        $this->userRepository->updateUser($userDTO->getId(), $password);

    }

    public function addPicture(PictureDTO $pictureDTO): bool
    {
        $userId = $_SESSION['id'];
        if ($this->userRepository->insertPicture($pictureDTO, $userId)) {

            return true;
        } else {

            return false;
        }
    }

    public function getAll(): \Generator
    {

        return $this->userRepository->findAll();
    }

    public function getPictures(string $username): \Generator
    {


        $user = $this->userRepository->findOneByName($username);
        $userId = $user->getId();

        if ($this->currentUser() === null) {
            $visibility = 'Public';
            return $this->userRepository->getAllPicturesPublic($visibility, $userId);

        } else if ($this->currentUser()->getUsername() === $_SESSION['targetName']) {

            return $this->userRepository->getAllPictures($userId);
        } else {

            $visibility = 'Private';
            return $this->userRepository->getAllPicturesProtected($visibility, $userId);
        }

    }

    private function encryptPass(UserDTO $userDTO)
    {
        $plainPass = $userDTO->getPassword();
        $hashPass = password_hash($plainPass, PASSWORD_DEFAULT);
        $userDTO->setPassword($hashPass);
    }


    public function editPicture(PictureDTO $pictureDTO, $visibility): bool
    {

        if ($this->userRepository->updatePicture($pictureDTO, $visibility)) {

            return true;
        } else {

            return false;
        }
    }

    public function submitReorderedPics($position, $id): bool
    {
        if ($this->userRepository->reorder($position, $id)) {
            return true;
        } else {

            return false;
        }
    }
}

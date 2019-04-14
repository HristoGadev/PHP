<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/7/2019
 * Time: 9:49 AM
 */

namespace App\Http;


use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class UserHttpHandler extends HttpHandlerAbstract
{
    public function allUsers(UserServiceInterface $userService){
       $this->render('users/all',$userService->getAll()) ;
    }

    public function profile(UserServiceInterface $userService, array $formData = [])
    {

        $currentUser = $userService->currentUser();

        if ($currentUser == null) {
            $this->redirect('login.php');
        }

        if (isset($formData['edit'])) {
            $this->editHandlerProcess($userService, $formData);
        } else {
            $this->render('users/profile', $currentUser);
        }
    }

    public function loginUser(UserServiceInterface $userService, array $formData = [])
    {

        if (isset($formData['login'])) {

            $this->loginHandlerProcess($userService, $formData);
        } else {
            $this->render('users/login');
        }
    }

    public function registerUser(UserServiceInterface $userService, array $formData = [])
    {

        if (isset($formData['register'])) {
            $this->registerHandlerProcess($userService, $formData);

        } else {

            $this->render('users/register');
        }
    }

    private function registerHandlerProcess(UserServiceInterface $userService, array $formData = [])
    {

        $user = $this->dataBinder->bind($formData,UserDTO::class);
        if ($userService->register($user, $formData['confirm_password'])) {
            $this->redirect('login.php');
        }else{
            $this->render("app/error",new ErrorDTO("Pass mismatch or user already exist"));
        }
    }

    private function loginHandlerProcess(UserServiceInterface $userService, array $formData = [])
    {
        $currentUser = $userService->login($formData['username'], $formData['password']);

        if (null !== $currentUser) {
            $_SESSION['id'] = $currentUser->getId();
            $this->redirect('profile.php');
        }else{
            $this->render("app/error",new ErrorDTO("Pass mismatch"));
        }
        return $currentUser;
    }

    private function editHandlerProcess(UserServiceInterface $userService, array $formData = [])
    {

        $user = $this->dataBinder->bind($formData,UserDTO::class);

        if ($userService->editUser($user)) {
            $this->redirect('profile.php');

        }else{
            $this->render("app/error",new ErrorDTO("Error editing data"));

        }

    }
}
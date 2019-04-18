<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/18/2019
 * Time: 10:18 AM
 */

namespace App\Http;


use App\Data\UserDTO;
use App\Service\UserServiceInterface;


class UserHttpHandler extends HttpHandlerAbstract
{
    public function forgottenPasswordByUser(UserServiceInterface $userService, $data)
    {
        if (isset($data['forgot_pass'])) {
            $this->forgotPassProcess($userService, $data);
        }

    }

    public function registerUser(UserServiceInterface $userService, $data = [])
    {

        if (isset($data["register"])) {
            $this->registerUserProcess($userService, $data);
        } else {
            $this->render("users/register");
        }

    }

    public function loginUser(UserServiceInterface $userService, $data = [])
    {
        if (isset($formData['login'])) {

            $this->loginHandlerProcess($userService, $data);
        } else {
            $this->render('users/login');
        }
    }

    private function registerUserProcess(UserServiceInterface $userService, array $data)
    {
        $user = $this->dataBinder->bind($data, UserDTO::class);
        if ($userService->register($user)) {
            $this->redirect('login.php');
        } else {
            $this->render("app/error", new ErrorDTO("User already exist"));
        }
    }

    private function loginHandlerProcess(UserServiceInterface $userService, array $data)
    {
        $currentUser = $userService->login($data['username'], $data['password']);

        if ($currentUser !== null) {
            $_SESSION['id'] = $currentUser->getId();
            $this->redirect('profile.php');
        } else {
            $this->render("app/error", new ErrorDTO("Wrong username or password"));
        }
        return $currentUser;
    }

    public function profile(UserServiceInterface $userService)
    {

        $currentUser = $userService->currentUser();

        if ($currentUser == null) {
            $this->redirect('login.php');
        } else {
            $this->render('users/profile', $currentUser);
        }
    }

    private function forgotPassProcess(UserServiceInterface $userService, $data)
    {
        $currentUser = $userService->forgottenPassword($data);
        if ($currentUser != null) {

            $userEmail = $currentUser->getEmail();
            $password = rand(999, 99999);

            $subject = "Your Recovered Password";

            $message = "Please use this password to login " . $password;
            $headers = "From : hr_gadev@abv.bg";

            if (mail($userEmail, $subject, $message, $headers)) {
                echo "Your Password has been sent to your email id";
            } else {
                echo "Failed to Recover your password, try again";
            }


        }
    }

}
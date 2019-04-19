<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/18/2019
 * Time: 10:18 AM
 */

namespace App\Http;


use App\Data\ErrorDTO;
use App\Data\PictureDTO;
use App\Data\UserDTO;
use App\Service\UserServiceInterface;


class UserHttpHandler extends HttpHandlerAbstract
{
    public function allUsers(UserServiceInterface $userService){
        $this->render('users/index',$userService->getAll()) ;
    }
    public function forgottenPasswordByUser(UserServiceInterface $userService, $data = [])
    {
        if (!isset($data['forgot_pass'])) {
            var_dump($data);
            echo "ok";
            $this->forgotPassProcess($userService, $data);
        } else {
            echo "failed";
            //$this->redirect("login.php");
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
        if (isset($data['login'])) {
            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header('WWW-Authenticate: Basic realm="My Realm"');
                header('HTTP/1.0 401 Unauthorized');
                exit;
            } else {
                echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}. Go to your <a href='profile.php'>Profile</a> </p>";
                echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
                $username = $_SERVER['PHP_AUTH_USER'];
                $password = $_SERVER['PHP_AUTH_PW'];
                $this->loginHandlerProcess($userService, $username, $password);

            }

        } else if (isset($data['forgot_password'])) {

            $this->render('users/forgottenPass');
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

    private function loginHandlerProcess(UserServiceInterface $userService, $username, $password)
    {
        $currentUser = $userService->login($username, $password);
        var_dump($currentUser);
        if ($currentUser !== null) {
            $_SESSION['id'] = $currentUser->getId();
            $this->redirect('profile.php');
        } else {
            $this->render("app/error", new ErrorDTO("Wrong username or password"));
        }
        return $currentUser;
    }

    public function profile(UserServiceInterface $userService, $data = [])
    {
        $currentUser = $userService->currentUser();

        if (isset($data['insert'])) {

            $name = $_FILES["image"]["name"];

            $visibility= $data['optradio'];
            print_r($visibility);

            $data = ['name' => $name,
                'visibility' => $visibility];

            $picture = $this->dataBinder->bind($data, PictureDTO::class);
            print_r($data);
            if ($userService->addPicture($picture)) {
                echo '<script>alert("Image Inserted into Database")</script>';
            } else {
                echo "Problem";
            }

        }

        if ($currentUser == null) {
            $this->redirect('login.php');
        } else {
            $this->render('users/profile', $currentUser);
        }
    }

    private function forgotPassProcess(UserServiceInterface $userService, $data)
    {
        $currentUser = $userService->forgottenPassword($data['forgot_pass']);
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

            $userService->editPassword($currentUser);

        } else {
            $this->render("app/error", new ErrorDTO("Username don`t exist"));
        }
    }

}
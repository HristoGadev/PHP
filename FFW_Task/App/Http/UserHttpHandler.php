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
    public function allPictures(UserServiceInterface $userService,$data=[])
    {
        $user=$_SESSION['targetName'];

         $this->render('users/gallery', $userService->getPictures($user));
    }

    public function allUsers(UserServiceInterface $userService, $data = [])
    {
        $this->render('users/index', $userService->getAll());

        if (isset($data['gallery'])) {

           $user= $data['gallery'];
           $_SESSION['targetName']=$user;

           $this->redirect('gallery.php');
        }else if(isset($data['profile'])){

            $this->redirect('profile.php');
        }

    }

    public function forgottenPasswordByUser(UserServiceInterface $userService, $data = [])
    {
        if (isset($data['forgot_pass'])) {

            $this->forgotPassProcess($userService, $data);
        } else {

            $this->render('users/forgottenPass');
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
                $username = $_SERVER['PHP_AUTH_USER'];
                $password = $_SERVER['PHP_AUTH_PW'];
                $this->loginHandlerProcess($userService, $username, $password);
            }
        } else if (isset($data['forgot_password'])) {

            $this->redirect('forgottenPass.php');
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
        if ($currentUser !== null) {
            $_SESSION['id'] = $currentUser->getId();
            $_SESSION['name'] = $currentUser->getUsername();


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

            $visibility = $data['optradio'];
            print_r($visibility);

            $data = ['name' => $name,
                'visibility' => $visibility];

            $picture = $this->dataBinder->bind($data, PictureDTO::class);

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
        $currentUser = $userService->forgottenPassword($data['username']);

        if ($currentUser != null) {

            $userEmail = $currentUser->getEmail();

            $password = rand(999, 99999);

            if (mail("You@me.com", "Your Recovered Password", "Please use this password to login " . $password, "From: me@you.com")) {
                echo "Your Password has been sent to " . $userEmail;
            } else {
                echo "Failed to Recover your password, try again";
            }

            $userService->editPassword($currentUser);

        } else {
            $this->render("app/error", new ErrorDTO("Username don`t exist"));
        }
    }

    private function getUser($user)
    {
        return $user;
    }

}
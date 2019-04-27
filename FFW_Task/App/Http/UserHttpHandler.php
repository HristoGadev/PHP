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
    public function logoutUser(UserServiceInterface $userService)
    {

        unset($_SESSION["id"]);
        unset($_SESSION["targetName"]);

        unset($_SERVER['PHP_AUTH_USER']);
        unset($_SERVER['PHP_AUTH_PW']);


        $this->redirect('index.php');
    }

    public function reorderPictures(UserServiceInterface $userService, $data = [])
    {

        $imageids_arr = $_POST['imageids'];
        var_dump($imageids_arr);

        $position = 1;
        foreach ($imageids_arr as $id) {
            $userService->submitReorderedPics($position, $id);
            $position++;
        }

    }

    public function allPictures(UserServiceInterface $userService, $data = [])
    {
        $user = $_SESSION['targetName'];
        $this->render('users/gallery', $userService->getPictures($user));


        if (isset($data['edit'])) {
            $name = $data['edit'];

            $visibility = $data['optradio'];

            $data = ['name' => $name,
                'visibility' => $visibility];

            $picture = $this->dataBinder->bind($data, PictureDTO::class);

            if ($userService->editPicture($picture, $visibility)) {
                echo '<script>alert("Image successfully edited")</script>';
            }
        }

    }

    public function allUsers(UserServiceInterface $userService, $data = [])
    {
        $this->render('users/index', $userService->getAll());

        if (isset($data['gallery'])) {

            $user = $data['gallery'];
            $_SESSION['targetName'] = $user;


            $this->redirect('gallery.php');
        } else if (isset($data['profile'])) {

            $user = $data['profile'];
            $_SESSION['targetName'] = $user;

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
        $this->render("users/login");
        if (isset($data['login'])) {

            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header('WWW-Authenticate: Basic realm="My Realm"');
                header('HTTP/1.0 401 Unauthorized');
                exit;
            } else {
                //echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}. Go to your <a href='profile.php'>Profile</a> </p>";

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

            $this->redirect('profile.php');
        } else {
            $this->render("users/login");
        }
    }

    private function loginHandlerProcess(UserServiceInterface $userService, $username, $password)
    {
        $currentUser = $userService->login($username, $password);

        if ($currentUser !== null) {
            $_SESSION['id'] = $currentUser->getId();

            $_SESSION['targetName'] = $currentUser->getUsername();


            $this->redirect('profile.php');
        } else {
            $this->render("users/login");
        }
        return $currentUser;
    }

    public function profile(UserServiceInterface $userService, $data = [])
    {

        $currentUser = $userService->currentUser();


        if (isset($data['insert'])) {


            $name = $_FILES["image"]["name"];

            if ($name != null) {

                $visibility = $data['optradio'];


                $data = ['name' => $name,
                    'visibility' => $visibility];

                $picture = $this->dataBinder->bind($data, PictureDTO::class);
                if ($userService->addPicture($picture)) {
                    echo '<script>alert("Image Inserted ")</script>';
                }
            } else {
                echo '<script>alert("Image is not inserted")</script>';;
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

            $password = $this->generatePassword();


            if (mail("You@me.com", "Your Recovered Password", "Please use this password to login " . $password, "From: me@you.com")) {
                echo "Your Password has been sent to " . $userEmail;
                $userService->editPassword($currentUser, $password);
                $this->redirect('register.php');

            } else {
                echo "Failed to Recover your password, try again";
            }


        }
    }

    private function generatePassword()
    {
        $length = 8;
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }

}
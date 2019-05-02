$(document).ready(function () {

    $('#rcdown').click(function () {

        $username='shithappens';
        $password='endgame'
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", '/profile.php', true,null,null);
        xmlhttp.setRequestHeader("Authorization", "Basic " + btoa($username + ":" + $password))
        xmlhttp.send();

        setTimeout(function () {
            window.location.href = 'http://localhost/FFW_Task/logout.php';
        }, 200);
    });
});

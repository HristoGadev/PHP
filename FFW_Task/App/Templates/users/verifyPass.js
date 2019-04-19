function checkPass() {

    // let pattern = /(?=^.{8}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&amp;*()_+}{&quot;:;'?&gt;.&lt;,])(?!.*\s).*$/gi;
    let button=document.getElementsByClassName('registerbtn');
    button.addEventListener('click', verifyPassword);

    function verifyPassword() {
        let input = document.getElementById('pass').value;
        if (input.length < 8) {
            alert('Password must be at least 8 characters long');
        }
    }
}

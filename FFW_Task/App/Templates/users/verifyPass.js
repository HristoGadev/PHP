function checkPass() {
    let input = document.getElementById('pass').value;
    let pattern = /(?=^.{8}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&amp;*()_+}{&quot;:;'?&gt;.&lt;,])(?!.*\s).*$/gi;

    if (pattern.test(input)) {
        return null;
    }
    alert('Password must be at least 8 characters long');
}
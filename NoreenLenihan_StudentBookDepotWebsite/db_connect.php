$link = new mysqli('localhost', 'noreen', 'porkchops411', 'regform');
if(!$link) {
die('Connection failed: ' . $link->error());
}
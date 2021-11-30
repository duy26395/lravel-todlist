<!-- $student = DB::table('student as s')
->select('s.id', 's.school ')
-> where('s.school ','=','Harvard');
foreach ($student as $values) {
echo $values["name"] . '\n';
}


$username = $_POST['username']; // get the input username
$result = $mysqli->query("SELECT `firstName`, `currentAddress`, `city` FROM `users` WHERE `username` = '$username' 
and 'city' like '%t%' LIMIT 1");
if ($user = $result->fetch_assoc()) {
echo $user['firstName'] . ' is living at ' . $user['currentAddress'];
echo "\nThis user's city has a T letter.";
} -->

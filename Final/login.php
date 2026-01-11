<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Session_Practice</h1>
    <form action="loginCheck.php" method="post">
    <table>
        <tr>
            <td>Username: </td>
            <td><input type="text" name="username" value=""></td>
        </tr>
        <tr>
            <td>Password: </td>
            <td><input type="password" name="password" value=""></td>
        </tr>
        <tr>
            <td>Hobbies: </td>
            <td>
                <input type="checkbox" name="hobbies[]" value="reading">Reading
                <input type="checkbox" name="hobbies[]" value="studying">Studying
                <input type="checkbox" name="hobbies[]" value="traveling">Traveling
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
    </form>
</body>
</html>
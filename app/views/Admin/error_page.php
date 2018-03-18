<?php
    switch (isset($error)) {
        case 'url':
            $error_msg = 'Url is already in use';


}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error page</title>
</head>
<body>
<h1><?php if (isset($error_msg) and !empty($error_msg)) { echo $error_msg; } ?></h1>
</body>
</html>
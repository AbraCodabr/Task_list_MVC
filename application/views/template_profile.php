<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <title>Профиль</title>
</head>
<body>

    <div class="greeting">
        <?echo '<h2>' . $_SESSION['user']['login'] . '</h2>'; ?>
        <form action="/profile/loggout/">
            <button class="button_exit">Exit</button>
        </form>
        
    </div>

    <div class="container">
    
        <!-- 1 блок -->
        <h3>Task list</h3>
        <form class="form" action="/profile/add/" method="post">
            <input class="ad enter_text" name="input" type="text" placeholder="Enter text ...">
            <button class="ad add_task" name="submit" type="submit">ADD TASK</button>
        </form>

        <div class="button_all">
            <form action="/profile/removeAll/" method="post">
                <button class="button_content">REMOVE ALL</button>
            </form>
            <form action="/profile/readyAll/" method="post">
                <button class="button_content">READY ALL</button>
            </form>
        </div>
        <?php include 'application/views/'.$content_view ?>
        
						
    </div>
</body>
</html>
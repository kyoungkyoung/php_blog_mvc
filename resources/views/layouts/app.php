<?php $_SESSION['CSRF_TOKEN'] = bin2hex(random_bytes(32)) ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>phpblog - <?php $_SESSION['REQUEST_URI'] ?? '' ?></title>

        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans+KR:400,500&display=swap&subset=korean">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.2.6/dist/css/uikit.min.css" >  
        <link rel="stylesheet" href="/app.css">
    </head>
<body>
    <div id="app" class="uk-container-expand">
        <nav id="nav" role="navigation" class="uk-navbar-container uk-navbar-transparent uk-padding uk-padding-remove-vertical uk-margin-bottom" uk-navbar>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                        <li><a herf="/">Home</a></li>
                        <li><a herf="/users/register">Register</a></li>
                    <?php if(array_key_exists('user', $_SESSION)) : ?>
                        <li><a herf="/posts/write">Write</a></li>
                        <li><a herf="#" id="logout">Sign out</a></li>
                    <?php else : ?>
                        <li><a herf="/auth/login">Sign in</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        <main id="main" role="main">
            <?php require_once dirname(__DIR__) . '/' . $view . '.php' ?>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.6/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.6/dist/js/uikit-icons.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/balloon-block/ckeditor.js"></script>
    <script src="/app.js"></script>
</body>
</html>

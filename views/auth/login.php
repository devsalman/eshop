<!DOCTYPE html>
<html lang="en" class="uk-height-1-1">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>E-Shop</title>
        <link rel="stylesheet" href="<?= assets('css/uikit.almost-flat.min.css'); ?>" />
        <link rel="stylesheet" href="<?= assets('css/app.css'); ?>" />
        <script type="text/javascript" src="<?= assets('js/jquery-2.1.4.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= assets('js/uikit.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= assets('js/components/grid.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= assets('js/core/utility.min.js'); ?>"></script>
    </head>

    <body class="uk-height-1-1">

        <div class="uk-vertical-align uk-text-center uk-height-1-1">
            <div class="uk-vertical-align-middle" style="width: 250px;">

                <form class="uk-panel uk-panel-box uk-form" method="POST" action="authenticate">
                    <div class="uk-form-row">
                        <input class="uk-width-1-1 uk-form-large" name="email" type="text" placeholder="Email">
                    </div>
                    <div class="uk-form-row">
                        <input class="uk-width-1-1 uk-form-large" name="password" type="password" placeholder="Password">
                    </div>
                    <div class="uk-form-row">
                        <input type="submit" class="uk-width-1-1 uk-button uk-button-primary uk-button-large" />
                    </div>
                    <div class="uk-form-row uk-text-small">
                        <label class="uk-float-left"><input type="checkbox"> Remember Me</label>
                        <a class="uk-float-right uk-link uk-link-muted" href="#">Forgot Password?</a>
                    </div>
                </form>

            </div>
        </div>

    </body>
</html>

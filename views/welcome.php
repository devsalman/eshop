<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>E-Shop</title>
        <link rel="stylesheet" href="<?= assets('css/uikit.almost-flat.min.css'); ?>" />
        <link rel="stylesheet" href="<?= assets('css/app.css'); ?>" />
        <script type="text/javascript" src="<?= assets('js/jquery-2.1.4.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= assets('js/uikit.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= assets('js/components/grid.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= assets('js/core/nav.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= assets('js/core/utility.min.js'); ?>"></script>
    </head>

    <body>
        <div class="header-container">
            <div class="uk-container uk-container-center">
                <div class="uk-grid">
                    <div class="uk-grid-width-1-4">
                        <img class="uk-responsive-height" src="<?= assets('img/logo.png'); ?>"></img>
                    </div>
                    <div class="uk-vertical-align uk-vertical-align-middle">
                        <form class="uk-form">
                            <fieldset data-uk-margin>
                                <input class="uk-form-width-large" type="text" placeholder="Search product / store" />
                                <select>
                                    <option>All Categories</option>
                                    <option>Electronics</option>
                                    <option>Sports</option>
                                    <option>Home</option>
                                </select>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-container">
            <div class="uk-container uk-container-center">
                <nav class="uk-nav">
                    <ul class="uk-navbar-nav">
                        <li class="uk-active"><a href="/">All Categories</a></li>
                        <li><a href="/">Electornics</a></li>
                        <li><a href="/">Home &amp; Garden</a></li>
                        <li><a href="/">Sports</a></li>
                        <li><a href="/">Motors</a></li>
                        <li><a href="/">Food</a></li>
                        <li><a href="/">Health &amp; Beauty</a></li>
                        <li><a href="/">Office &amp; Stationary</a></li>
                        <li><a href="/">Other</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </body>

</html>

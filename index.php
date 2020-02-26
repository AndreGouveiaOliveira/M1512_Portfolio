<nav class="uk-navbar-container uk-margin" uk-navbar>
    <div class="uk-navbar-left">

        <a class="uk-navbar-item uk-logo" href="index.php">Mon Blog</a>

        <ul class="uk-navbar-nav uk-position-right">
            <li>
                <a class="uk-navbar-item uk-logo" href="index.php">
                    <span class="uk-icon uk-margin-small-right" uk-icon="icon: home"></span>
                    Home
                </a>
            </li>
            <li>
                <a class="uk-navbar-item uk-logo" href="post.php">
                    <span class="uk-icon uk-margin-small-right" uk-icon="icon: plus"></span>
                    New Post
                </a>
            </li>
            <li>
                <a class="uk-navbar-item uk-logo" href="index.php">
                    <span class="uk-icon uk-margin-small-right" uk-icon="icon: user"></span>
                </a>
            </li>
        </ul>

    </div>
</nav>

<body style="background-color: lightgrey">
    <div class="uk-flex uk-margin-small-left">
        <div class="uk-margin-medium-left uk-width-1-5">
            <div class="uk-card uk-card-default uk-margin-medium-top">
                <div class="uk-card-media-top">
                    <img src="images/icon.jpg" height="520" width="580" alt="">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">Nom du Blog</h3>
                    <p>Description</p>
                </div>
            </div>
            <div class="uk-card uk-card-default uk-card-body uk-margin-medium-top">
                <h3 class="uk-card-title">A propos</h3>
                <button class="uk-button uk-button-default uk-width-1-1 uk-margin-small-bottom">Modal / Dialog</button>
                <button class="uk-button uk-button-default uk-width-1-1 uk-margin-small-bottom">Datetime Exemple</button>
                <button class="uk-button uk-button-default uk-width-1-1 uk-margin-small-bottom">Data Grids</button>
            </div>
        </div>

        <div class="uk-margin-medium-left uk-margin-medium-right uk-width-4-5">

            <div class="uk-card uk-card-default uk-card-body uk-margin-medium-top">
                <div class="uk-card-header">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-auto">
                            <img class="uk-border-circle" width="40" height="40" src="images/icon.jpg">
                        </div>
                        <div class="uk-width-expand">
                            <h3 class="uk-card-title uk-margin-remove-bottom">Welcome</h3>
                        </div>
                    </div>
                </div>
                <div class="uk-card-body">
                    <p>Good to see you</p>
                </div>
            </div>


            <div class="uk-card uk-card-default uk-card-body uk-margin-medium-top">
                <div class="uk-card-header">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-auto">
                            <img class="uk-border-circle" width="40" height="40" src="images/icon.jpg">
                        </div>
                        <div class="uk-width-expand">
                            <h3 class="uk-card-title uk-margin-remove-bottom">Salut Poto</h3>
                        </div>
                    </div>
                </div>
                <div class="uk-card-body">
                    <p>Comment va</p>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- UIkit CSS -->
<link rel="stylesheet" href="css/uikit.min.css" />

<!-- UIkit JS -->
<script src="js/uikit.min.js"></script>
<script src="js/uikit-icons.min.js"></script>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../Resoures/my.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>!!!</title>
    <script src="../../Resoures/jquery-3.6.0.min.js"></script>
    <script src="../../Resoures/main.js"></script>
</head>
<body>

<div id="header">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <?if(isAdmin()):?>
            <li class="nav-item">
                <a class="nav-link font-weight-bold" href="admin">Admin panel</a>
            </li>
            <?endif;?>
            <li>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </li>
        </ul>
        <?if(session()->get('auth') == true):?>
        <div class="pr-5">
            <a href="create" type="button" class="btn btn-success">New post</a>
        </div>
<div class="pr-2">
        <a href="profile">
            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" width="32" height="32" class="rounded-circle me-2">
            <strong>Profile</strong>
        </a>
</div>
        <div class="pr-4">
        <a href="logout" class="btn btn-danger" width="32" height="32">Logout</a>
        </div>
        <?else:?>
            <div class="pr-4">
                <a href="login" class="btn btn-primary" width="32" height="32">Login</a>
            </div>
<?endif;?>
    </div>
</nav>
</div>


<main>
<div id = sidebar>
<div class="d-flex float-left flex-column flex-shrink-0 p-3 bg-light fixed-top" style="width: 11%; height: 100%;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/" class="nav-link active" aria-current="page">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Articles
            </a>
        </li>
        <li>
            <a href="users" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Users
            </a>
        </li>
    </ul>
    <hr>
</div>
</div>

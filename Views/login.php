<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../Resoures/my.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body id="login">
<form action="log" method="post">
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Sign in</h3>
                            <? if (session()->checkErrors('email')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->getErrors('email') ?>
                                </div>
                            <?endif;?>
                            <div class="form-outline mb-4">
                                <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmailX-2">Email</label>
                            </div>
                            <? if (session()->checkErrors('pass')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->getErrors('pass') ?>
                                </div>
                            <?endif;?>
                            <div class="form-outline mb-4">
                                <input type="password" id="typePasswordX-2" name="pass" class="form-control form-control-lg" />
                                <label class="form-label" for="typePasswordX-2">Password</label>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-start mb-4">
                                <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="remember"
                                        value="1"
                                        id="form1Example3"
                                />
                                <label class="form-check-label" for="form1Example3"> Remember password </label>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                            <hr class="my-4">
                            <h4>Don't have account?</h4>
                            <a href="register" class="btn btn-success">Register</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
</body>
</html>



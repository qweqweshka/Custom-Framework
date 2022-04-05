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
<body id="register">
<section class="vh-100 bg-image">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                            <form action="reg" method="post">
                                <? if (session()->checkErrors('login')): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getErrors('login') ?>
                                    </div>
                                <?endif;?>
                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example1cg" value="<?=old('login')?>" class="form-control form-control-lg" name="login" />
                                    <label class="form-label" for="form3Example1cg">Your Login</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="email" id="form3Example3cg" value="<?=old('email')?>" class="form-control form-control-lg" name="email" />
                                    <label class="form-label" for="form3Example3cg">Your Email</label>
                                </div>
                                <? if (session()->checkErrors('pass1')): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getErrors('pass1') ?>
                                    </div>
                                <?endif;?>
                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="pass1" />
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                </div>
                                <? if (session()->checkErrors('pass2')): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getErrors('pass2') ?>
                                    </div>
                                <?endif;?>
                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="pass2" />
                                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                </div>

                                <? if (session()->checkErrors('check')): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getErrors('check') ?>
                                    </div>
                                <?endif;?>
                                <div class="form-check d-flex justify-content-center mb-5">
                                    <input
                                            class="form-check-input me-2"
                                            type="checkbox"
                                            name="check"
                                            value="1"
                                            id="form2Example3cg"
                                    />
                                    <label class="form-check-label" for="form2Example3g">
                                        I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login" class="fw-bold text-body"><u>Login here</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
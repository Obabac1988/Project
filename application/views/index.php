<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DeNisă.ro</title>
    <meta name="description" content="Festivals of the year">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <!--    CSS bootstrap and personal   -->
    <link rel="icon" href="../assets/media/FestivalsLogo.png">
    <link rel="stylesheet" href="../application/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../application/assets/css/style2.css">

    <!--    Bootstrap JS   -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

</head>
<body id="body" class="bk-night">
<div>

    <div class="menu">
        <div class="exp">
            <button class="btn-toggle navbar-toggler" type="button">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </button>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/festival/index">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>

            </ul>
        </div>
    </nav>

    <div class="btn btn-auth">

        <?php if (Auth::instance()->logged_in()) { ?>
            <a href='/user/logout'>
                <button class='btn btn-secondary'>Log Out</button>
            </a>
            <!--//            HTTP::redirect('/');-->
        <? } else { ?>
            <!--            <button type=\"submit\" data-toggle=\"modal\" data-target=\"#myModal\" value=\"Sign\" class=\"btn btn-outline-primary\">Sign Up / Sign In</button>-->
            <button type="submit" data-toggle="modal" data-target="#myModal" value="Sign"
                    class="btn btn-outline-primary">Sign Up / Sign In
            </button>
        <? } ?>


        <!--        --><?php //if (!empty($log)) {
        //            echo $log;
        //        } else {
        //            echo " <button type="submit" data-toggle="modal\" data-target=\"#myModal\" value=\"Sign\"class=\"btn btn-outline-primary\">Sign Up / Sign In</button>";
        //        }
        //        ?>
        <!--                <button type="submit" data-toggle="modal" data-target="#myModal" value="Sign"-->
        <!--                        class="btn btn-outline-primary">Sign Up / Sign In-->
        <!--                </button>-->


    </div>

</div>


<!--Modal: Login / Register Form-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i
                                    class="fas fa-user mr-1"></i>
                            Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i
                                    class="fas fa-user-plus mr-1"></i>
                            Register</a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                        <!--Body-->
                        <div id="login" class="modal-body mb-1">
                            <form method="post" action="/user/login" class="form-group form-mine">
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-envelope prefix"></i>
                                    <label data-error="wrong" data-success="right" for="modalLRInput10">Your
                                        email</label>
                                    <input name="email" type="email" id="modalLRInput10"
                                           class="form-control form-control-sm validate">
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix"></i>
                                    <label data-error="wrong" data-success="right" for="modalLRInput11">Your
                                        password</label>
                                    <input name="password" type="password" id="modalLRInput11"
                                           class="form-control form-control-sm validate">
                                </div>
                                <div class="text-center mt-2">
                                    <div><!--<p>Remember Me</p>-->
                                        <label>Remember Me</label>
                                        <input type="checkbox" about="Remember me" name="remember"><br></div>
                                    <input type="submit" class="btn btn-info" value="Log In">
                                </div>
                            </form>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <div class="options text-center text-md-right mt-1">
                                <!--<p>Not a member? <a id="tabreg" data-toggle="tab" href="#panel8" role="tab"
                                                    class="blue-text">Sign Up</a></p>-->
                                <!--<p>Forgot <a href="#" class="blue-text">Password?</a></p>-->
                            </div>
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto"
                                    data-dismiss="modal">Close
                            </button>
                        </div>

                    </div>
                    <!--/.Panel 7-->

                    <!--Panel 8-->
                    <div class="tab-pane fade" id="panel8" role="tabpanel">

                        <!--Body-->
                        <div id="register" class="modal-body">
                            <form method="post" action="/festival/create" class="form-group form-mine">
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-envelope prefix"></i>
                                    <label data-error="wrong" data-success="right" for="modalLRInput12">First
                                        Name</label>
                                    <input type="text" id="" name="first_name"
                                           class="form-control form-control-sm validate">
                                </div>

                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-envelope prefix"></i>
                                    <label data-error="wrong" data-success="right" for="modalLRInput12">Last
                                        Name</label>
                                    <input type="text" id="" name="last_name"
                                           class="form-control form-control-sm validate">
                                </div>

                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-envelope prefix"></i>
                                    <label data-error="wrong" data-success="right" for="modalLRInput12">Your
                                        email</label>
                                    <input name="email" type="email" id="modalLRInput12"
                                           class="form-control form-control-sm validate">
                                </div>

                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-lock prefix"></i>
                                    <label data-error="wrong" data-success="right" for="modalLRInput13">Your
                                        password</label>
                                    <input name="password" type="password" id="modalLRInput13"
                                           class="form-control form-control-sm validate">
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix"></i>
                                    <label data-error="wrong" data-success="right" for="modalLRInput14">Repeat
                                        password</label>
                                    <input name="password_confirm" type="password" id="modalLRInput14"
                                           class="form-control form-control-sm validate">
                                </div>

                                <div class="text-center form-sm mt-2">

                                    <input type="submit" class="btn btn-info" value="Sign Up">


                                </div>
                            </form>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <div class="options text-right">
                                <!--<p class="pt-1">Already have an account? <a id="tabLogin" data-toggle="tab"
                                                                            href="#panel7" role="tab"
                                                                            class=" blue-text">Log In</a>
                                </p>-->
                            </div>
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto"
                                    data-dismiss="modal">Close
                            </button>
                        </div>
                    </div>
                    <!--/.Panel 8-->
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
Modal: Login / Register Form


<div class="text-center">
    <a href="" class="btn btn-default btn-rounded my-3" data-toggle="modal" data-target="#modalLRForm">Launch
        Modal LogIn/Register</a>
</div>

<script>

    $('#tabreg').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show');
    })
    $('#tabLogin').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show');
    })

</script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-mine">
                <div class="row">


                    <div class="col-md-8">
                        <h3>
                            <?= $rock->title ?>

                        </h3>
                        <dl>
                            <dt>
                                LineUP :
                            </dt>
                            <dd style="text-align: justify;font-family: Calibri, sans-serif ">
                                <?php $lineup = json_decode($rock->lineup);
                                foreach ($lineup as $item) {
                                    echo $item.", ";
                                }
                                ?>
                            </dd>
                            <dd>

                            </dd>
                            <a href="/festival/review">Review of festival</a>

                        </dl>
                    </div>

                    <div class="col-md-4">
                        <img width="100%" alt="Bootstrap Image Preview" src="<?= $rock->img ?>"/>
                    </div>
                </div>
            </div>
            <div class="card-mine">
                <div class="row">
                    <div class="col-md-4">
                        <img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg"/>
                    </div>
                    <div class="col-md-8">
                        <h3>
                            h3. Lorem ipsum dolor sit amet.
                        </h3>
                        <dl>
                            <dt>
                                Description lists
                            </dt>
                            <dd>
                                A description list is perfect for defining terms.
                            </dd>
                            <dt>
                                Euismod
                            </dt>
                            <dd>
                                Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                            </dd>
                            <dd>
                                Donec id elit non mi porta gravida at eget metus.
                            </dd>
                            <dt>
                                Malesuada porta
                            </dt>
                            <dd>
                                Etiam porta sem malesuada magna mollis euismod.
                            </dd>
                            <dt>
                                Felis euismod semper eget lacinia
                            </dt>
                            <dd>
                                Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum
                                massa
                                justo sit amet risus.
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>




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
    <link rel="stylesheet" href="/application/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/application/assets/css/starraiting.css">
    <link rel="stylesheet" href="/application/assets/css/style2.css">


    <!--    Bootstrap JS   -->
    <!-- Latest compiled and minified CSS -->


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d43b29e3f2.js" crossorigin="anonymous"></script>
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
                <li class="nav-item nav-btn active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <!--                <li class="nav-item">-->
                <!--                    <a class="nav-link" href="#">About</a>-->
                <!--                </li>-->
                <!--                <li class="nav-item">-->
                <!--                    <a class="nav-link" href="#">Contact</a>-->
                <!--                </li>-->

            </ul>
        </div>
    </nav>

    <div id="login-logout-register" class="btn btn-auth">

        <?php if (Auth::instance()->logged_in()) { ?>
            <a href='/user/logout'>
                <button class='btn btn-outline-light '>Log Out</button>
            </a>
            <!--//            HTTP::redirect('/');-->
        <? } else { ?>
            <!--            <button type=\"submit\" data-toggle=\"modal\" data-target=\"#myModal\" value=\"Sign\" class=\"btn btn-outline-primary\">Sign Up / Sign In</button>-->
            <button type="submit" data-toggle="modal" data-target="#myModal" value="Sign"
                    class="btn btn-outline-primary">Sign Up / Sign In
            </button>
        <? } ?>


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
                            <form method="post" action="/user/create" class="form-group form-mine">
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

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h3>Reviews & ratings : ...</h3>
            <?php


            //            echo Debug::vars($reviews);
            foreach ($reviews as $review) { ?>

                <div class='card-mine' style="display: block">
                    <div>
                    <span class="fa fa-star <?= $review->rating >= 1 ?"rating__icon--star" : ""?>"></span>
                    <span class="fa fa-star <?= $review->rating >= 2 ?"rating__icon--star" : ""?>"></span>
                    <span class="fa fa-star <?= $review->rating >= 3 ?"rating__icon--star" : ""?>"></span>
                    <span class="fa fa-star <?= $review->rating >= 4 ?"rating__icon--star" : ""?>"></span>
                    <span class="fa fa-star <?= $review->rating >= 5 ?"rating__icon--star" : ""?>"></span>
                     <?= $review->user->email  ?>
                    </div>
                    <br>
                  <div>
                    <p><?= $review->comment ?></p>
                  </div>
                    <!--                    <p>".$review->created."</p>;-->
                    <!--                    <p>".$review->modified."</p>;-->

                </div>

            <?php } ?>
            <div class="row">
                <div class="col-sm-12">


                    <?php

                    if (Auth::instance()->logged_in()) {
                        $user_reviewed = $current_user_review->loaded();

                        ?>


                        <form id="ratingForm" method="POST">


                            <div id="full-stars-example-two">
                                <div class="rating-group">
                                    <input disabled checked class="rating__input rating__input--none" name="rating"
                                           id="rating3-none" value="0"
                                           type="radio" <?= !($user_reviewed && $current_user_review->rating == 0) ?: "checked" ?>>
                                    <label aria-label="1 star" class="rating__label" for="rating3-1"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating" id="rating3-1" value="1"
                                           type="radio" <?= !($user_reviewed && $current_user_review->rating == 1) ?: "checked" ?>>
                                    <label aria-label="2 stars" class="rating__label" for="rating3-2"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating" id="rating3-2" value="2"
                                           type="radio" <?= !($user_reviewed && $current_user_review->rating == 2) ?: "checked" ?>>
                                    <label aria-label="3 stars" class="rating__label" for="rating3-3"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating" id="rating3-3" value="3"
                                           type="radio" <?= !($user_reviewed && $current_user_review->rating == 3) ?: "checked" ?>>
                                    <label aria-label="4 stars" class="rating__label" for="rating3-4"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating" id="rating3-4" value="4"
                                           type="radio" <?= !($user_reviewed && $current_user_review->rating == 4) ?: "checked" ?>>
                                    <label aria-label="5 stars" class="rating__label" for="rating3-5"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating" id="rating3-5" value="5"
                                           type="radio" <?= !($user_reviewed && $current_user_review->rating == 5) ?: "checked" ?>>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="comment">Comment*</label>

                                <textarea class="form-control" rows="5" id="comment" name="comment"
                                          required><?php
                                    if ($user_reviewed) {
                                        echo $current_user_review->comment;
                                    }
                                    ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" id="saveReview">Save Review</button>
                                <button type="submit" class="btn btn-info" id="deleteReview">Delete Review</button>

                            </div>


                        </form>

                    <? } ?>
                </div>

            </div>
        </div>
    </div>
</div>


</body>
</html>
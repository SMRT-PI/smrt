
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
        <link rel="stylesheet" href="css/style.css">

        <title>Hello, world!</title>
    </head>
    <body>

        <div class="row">
            <div class="col-sm-6 offset-md-3">

                <div class="post-content">
                    <h4>Título da minha publicação</h4>
                    <span class="text-muted small"><i class="fas fa-user"></i> Lucas Biagi - <i class="far fa-clock"></i> 00/00/00 às 00:00</span>
                    <div class="media">
                        <img class="mr-3" src="images/coding.jpg">
                        <div class="media-body">
                            Em um passeio em família pela margem do Rio Tubarão, me deparo com esta situação desagradável!
                            <p class="button"><a href="#" class="btn btn-info btn-sm">Ler Mais</a></p>
                            <p><!------ Include the above in your HEAD tag ---------->

                                <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

                            <div class="container">
                                <div>


                                    <div class="facebook-reaction"><!-- container div for reaction system --> 
                                        <span class="like-btn"> <!-- Default like button --> 
                                            <span class="fa like-btn-emo fa-thumbs-o-up"></span> <!-- Default like button emotion--> 
                                            <span class="like-btn-text">Like</span> <!-- Default like button text,(Like, wow, sad..) default:Like  -->
                                            <ul class="reactions-box">
                                                <!-- Reaction buttons container-->
                                                <li class="reaction reaction-like" data-reaction="Like"></li>
                                                <li class="reaction reaction-love" data-reaction="Love"></li>
                                                <li class="reaction reaction-haha" data-reaction="HaHa"></li>
                                                <li class="reaction reaction-wow" data-reaction="Wow"></li>
                                                <li class="reaction reaction-sad" data-reaction="Sad"></li>
                                                <li class="reaction reaction-angry" data-reaction="Angry"></li>
                                            </ul>
                                        </span>
                                        <div class="like-stat"> <!-- Like statistic container--> 
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="post-content">
                        <h4>Título da minha publicação</h4>
                        <span class="text-muted small"><i class="fas fa-user"> < /i> Lara Bez - <i class="far fa-clock"></i > 00 / 00 / 00 às 00:00 < /span>
                                <div class="media">
                                    <img class="mr-3" src="images/coding.jpg">
                                    <div class="media-body">
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                        <p class="button"><a href="#" class="btn btn-info btn-sm">Ler Mais</a></p>
                                    </div>
                                </div>
                                </div>

                                <div class="post-content">
                                    <h4>Título da minha publicação</h4>
                                    <span class="text-muted small"><i class="fas fa-user"></i> Ezequias Lindo - <i class="far fa-clock"></i> 00/00/00 às 00:00</span>
                                    <div class="media">
                                        <img class="mr-3" src="images/coding.jpg">
                                        <div class="media-body">
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                            <p class="button"><a href="#" class="btn btn-info btn-sm">Ler Mais</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="post-content">
                                    <h4>Título da minha publicação</h4>
                                    <span class="text-muted small"><i class="fas fa-user"></i> Admin - <i class="far fa-clock"></i> 00/00/00 às 00:00</span>
                                    <div class="media">
                                        <img class="mr-3" src="images/coding.jpg">
                                        <div class="media-body">
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                            <p class="button"><a href="#" class="btn btn-info btn-sm">Ler Mais</a></p>
                                        </div>
                                    </div>
                                </div>

                                </div>

                                <!-- Optional JavaScript -->
                                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
                                </body>
                                </html>

                                <script>
                                    $(document).ready(function () {
                                        "use strict";
                                        $(".reaction").on("click", function () {   // like click
                                            var data_reaction = $(this).attr("data-reaction");
                                            $(".like-details").html("You, Dhaval Rana and 1k others");
                                            $(".like-btn-emo").removeClass().addClass('like-btn-emo').addClass('like-btn-' + data_reaction.toLowerCase());
                                            $(".like-btn-text").text(data_reaction).removeClass().addClass('like-btn-text').addClass('like-btn-text-' + data_reaction.toLowerCase()).addClass("active");

                                            if (data_reaction === "Like") {
                                                $(".like-emo").html('<span class="like-btn-like"></span>');
                                            } else {
                                                $(".like-emo").html('<span class="like-btn-like"></span><span class="like-btn-' + data_reaction.toLowerCase() + '"></span>');
                                            }
                                        });
                                        $(".like-btn-text").on("click", function () { // undo like click
                                            if ($(this).hasClass("active")) {
                                                $(".like-btn-text").text("Like").removeClass().addClass('like-btn-text');
                                                $(".like-btn-emo").removeClass().addClass('like-btn-emo').addClass("like-btn-default");
                                                $(".like-emo").html('<span class="like-btn-like"></span>');
                                                $(".like-details").html("Dhaval Rana and 1k others");

                                            }
                                        });
                                    });

                                </script>
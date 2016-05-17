<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#page-top"> SPIROUX Emeric </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="#portfolio">Portfolio</a>
                </li>
                <li class="page-scroll">
                    <a href="#about">About</a>
                </li>
                <li class="page-scroll">
                    <a href="#contact">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="<?= __BASE_URL__ ?>assets/img/profile.png" alt="">
                <div class="intro-text">
                    <span class="name">Spiroux Emeric</span>
                    <span class="skills">Ecole 42</span>
                    <hr class="star-light">
                    <span class="skills">Swift<br/>Developer</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Portfolio Grid Section -->
<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Swift Projects</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="<?= __BASE_URL__ ?>assets/img/portfolio/colocbox.png" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
            <a href="#portfolioModalSwiftyProtein" class="portfolio-link" data-toggle="modal">
                <div class="caption">
                    <div class="caption-content">
                        <i class="fa fa-search-plus fa-3x"></i>
                    </div>
                </div>
                <img src="<?= __BASE_URL__ ?>assets/img/portfolio/swiftyprotein.png" class="img-responsive" alt="">
            </a>
        </div>
        <div class="col-sm-4 portfolio-item">
            <a href="#portfolioModalcorrect42" class="portfolio-link" data-toggle="modal">
                <div class="caption">
                    <div class="caption-content">
                        <i class="fa fa-search-plus fa-3x"></i>
                    </div>
                </div>
                <img src="<?= __BASE_URL__ ?>assets/img/portfolio/correct42.png" class="img-responsive" alt="">
            </a>
        </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Others</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="<?= __BASE_URL__ ?>assets/img/portfolio/festimove.png" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="<?= __BASE_URL__ ?>assets/img/portfolio/oneword.png" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="<?= __BASE_URL__ ?>assets/img/portfolio/wolf3d.png" class="img-responsive" alt="">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="success" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>About</h2>
                <hr class="star-light">
            </div>
        </div>
        <div class="row" style="text-align:justify">
            <div class="col-lg-4 col-lg-offset-2">
                <p>Since long time, computers be present under my hands and today my experience need to be useful for you. Curious, Autonomous and pragmatic, i can adapt myself to any request. My skills palette going through <a href="http://www.intel.com/content/dam/www/public/us/en/documents/manuals/64-ia-32-architectures-software-developer-manual-325462.pdf">asm</a>, <a href="https://en.wikipedia.org/wiki/C_(programming_language)">c</a> and passing by <a href="https://angular.io/">AngularJs</a>, <a href="https://github.com/apple/swift">swift</a> and many other language.</p>
            </div>
            <div class="col-lg-4">
                <p> I have a reason for it, i learn very quickly with a good practice of technical monitoring. I'm very interested by project who link computers and nature respect so as to keep humankind free of all worry. Please don't hesitate to contact me if you think that i can help.</p>
            </div>
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <a href="<?= __BASE_URL__?>mother/cv" class="btn btn-lg btn-outline">
                    <i class="fa fa-download"></i> Download C.V.
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Contact Me</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <form name="sentMessage" id="contactForm" method="POST" action="<?= __BASE_URL__ ?>mother/contact">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Phone Number</label>
                            <input type="text" name="phonenumber" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="5" name="message" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success btn-lg">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Location</h3>
                    <p>Ecole 42<br>96 Boulevard Bessières, 75017</p>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Around the Web</h3>
                    <ul class="list-inline">
                        <li>
                            <a href="https://fr.linkedin.com/in/emericspiroux" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            <a href="https://github.com/emericspiroux" class="btn-social btn-outline"><i class="fa fa-fw fa-github"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h3>About Freelancer</h3>
                    <p>Freelance is a free to use, open source Bootstrap theme created by <a href="http://startbootstrap.com">Start Bootstrap</a>. <br/>Thanks to the team.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; spiroux-web.fr 2016
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visible-sm">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up center-fontaw"></i>
    </a>
</div>

<!-- Portfolio Modals -->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>Festimove</h2>
                        <hr class="star-primary">
                        <img src="<?= __BASE_URL__ ?>assets/img/portfolio/festimove.png" class="img-responsive img-centered" alt="">
                        <p>Festimove est un site de réservation de transport en commun à destination de festival de musique Hardteck en Europe. Mon travail au sein de cette entreprise fût de m'occuper de la maintenance, d'organiser la déclinaison avec les sous gérants (Festivals HardRock, Electronique, Gay) ansi que l'administration serveur lors du passage en production.</p>
                        <ul class="list-inline item-details">
                            <li>Client:
                                <strong><a href="http://festimove.fr">Festimove</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong><a>Septembre 2014 - Fevrier 2015</a>
                                </strong>
                            </li>
                            <li>Service:
                                <strong><a>Web Development</a>
                                </strong>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>One Word</h2>
                        <hr class="star-primary">
                        <a href="http://oneword.spiroux-web.fr"><img src="<?= __BASE_URL__ ?>assets/img/portfolio/oneword.png" class="img-responsive img-centered" alt=""></a>
                        <p>One word est un jeu par navigateur dont le but est de construire une phrase sur son profil. La limite étant que chaque mot est unique et seul son possesseur peut l'utiliser. Un système de vente aux enchères de chaque mot est mis en place afin que les mots puissent être échangés.</p>
                        <ul class="list-inline item-details">
                            <li>Client:
                                <strong><a >Personnel</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong><a >Janvier 2015</a>
                                </strong>
                            </li>
                            <li>Service:
                                <strong><a >Web Development</a>
                                </strong>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>ColocBox</h2>
                        <hr class="star-primary">
                        <img src="<?= __BASE_URL__ ?>assets/img/portfolio/colocbox.png" class="img-responsive img-centered" alt="">
                        <p>ColocBox est une application de gestion de tâches automatisées sur mobile. Actuellement en version Alpha et prochainement disponible dans sa version la plus simple, c'est-à-dire ajouter et afficher les tâches déjà faites, sur l'android market et l'App Store. Elle permet à une colocation de savoir quelles tâches effectuer. Plusieurs améliorations sont en cours notamment la désignation hebdomadaire de tâches pour une personne en fonction de la difficulté de celle faites auparavant. Mise en ligne fin Septembre 2016 en version Bêta.</p>
                        <ul class="list-inline item-details">
                            <li>Client:
                                <strong><a >Personnel</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong><a >Novembre 2015 - Aujourd'hui</a>
                                </strong>
                            </li>
                            <li>Service:
                                <strong><a >Full Swift, Java - IOS and Android Development</a>
                                </strong>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>Wolfenstein</h2>
                        <hr class="star-primary">
                        <a href="https://github.com/emericspiroux/wolf3d"><img src="<?= __BASE_URL__ ?>assets/img/portfolio/wolf3d.png" class="img-responsive img-centered" alt=""></a>
                        <p>Utilisation de la LibX pour coder un jeu "doom like" en raycasting avec colision, texture et sprites destructibles.</p>
                        <ul class="list-inline item-details">
                            <li>Client:
                                <strong><a>Ecole 42</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong><a>Mai 2014</a>
                                </strong>
                            </li>
                            <li>Service:
                                <strong><a>C language</a>
                                </strong>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>Project Title</h2>
                        <hr class="star-primary">
                        <img src="<?= __BASE_URL__ ?>assets/img/portfolio/safe.png" class="img-responsive img-centered" alt="">
                        <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                        <ul class="list-inline item-details">
                            <li>Client:
                                <strong><a>Start Bootstrap</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong><a>April 2014</a>
                                </strong>
                            </li>
                            <li>Service:
                                <strong><a>Web Development</a>
                                </strong>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>Project Title</h2>
                        <hr class="star-primary">
                        <img src="<?= __BASE_URL__ ?>assets/img/portfolio/submarine.png" class="img-responsive img-centered" alt="">
                        <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                        <ul class="list-inline item-details">
                            <li>Client:
                                <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong><a href="http://startbootstrap.com">April 2014</a>
                                </strong>
                            </li>
                            <li>Service:
                                <strong><a href="http://startbootstrap.com">Web Development</a>
                                </strong>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModalSwiftyProtein" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>Swifty Protein</h2>
                        <hr class="star-primary">
                        <a href="https://github.com/emericspiroux/SwiftyProtein"><img src="<?= __BASE_URL__ ?>assets/img/portfolio/swiftyprotein.png" class="img-responsive img-centered" alt=""></a>
                        <p>Swifty Protein est une application permettant d'afficher la constitution graphique d'un Ligand à partir d'un modèle "Stick-and-ball" ou Van Der Waals Radius. Vous pouvez enregistrer dans votre photothèque ou le partager par email. Des informations sur la constitution du Ligand sont disponibles en touchant l'icône information.</p>
                        <ul class="list-inline item-details">
                            <li>Client:
                                <strong><a href="http://startbootstrap.com">Ecole 42</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong><a href="http://startbootstrap.com">Mars 2016</a>
                                </strong>
                            </li>
                            <li>Service:
                                <strong><a href="http://startbootstrap.com">Swift Development</a>
                                </strong>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="portfolio-modal modal fade" id="portfolioModalcorrect42" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>Swifty Companion</h2>
                        <hr class="star-primary">
                        <a><img src="<?= __BASE_URL__ ?>assets/img/portfolio/correct42.png" class="img-responsive img-centered" alt=""></a>
                        <p>Swifty companion est une application basé sur l'API de l'Ecole 42. Elle permet l'affichage du profil de l'utilisateur connecté via OAuth et lui permet de rechercher les données d'un élève (Informations, projects et compétences).La derniere mise à jour permet de voir ses corrections à venir. L'api ne permet malheureusement pas de savoir si c'est la correction de votre projet ou de celui d'un de vos collègue. (MàJ à venir)</p>
                        <ul class="list-inline item-details">
                            <li>Client:
                                <strong><a href="http://startbootstrap.com">Ecole 42</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong><a href="http://startbootstrap.com">April 2016</a>
                                </strong>
                            </li>
                            <li>Service:
                                <strong><a href="http://startbootstrap.com">Swift Development</a>
                                </strong>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

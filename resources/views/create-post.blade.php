<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Create Post | Bluumhealth</title>
    <meta name="description" content="Create Post Page Description" />
    <meta name="author" content="Farawe iLyas" />
    <link rel="icon" type="image/x-icon" href="./assets/images/favicon.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <!-- FONTS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i,800,800i" />
    <!-- ICON -->
    <link rel="stylesheet" href="./assets/fonts/mainfont/style.css" />
    <link rel="stylesheet" href="./assets/fonts/font-awesome/font-awesome.min.css" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/custom.css" />
</head>
<body>
    <!-- NAVIGATION -->
    <header>
        <div class="header js-header js-dropdown">
            <div class="container">
                <div class="header__logo">
                    <a class="header__link" href="index.html" title="Bluumhealth">
                        <h1>
                            <img src="./assets/images/logo_small.png" alt="logo" />
                        </h1>
                        <div class="header__logo-btn">Bluumhealth</div>
                    </a>
                </div>
                <div class="header__search">
                    <form action="#">
                        <label>
                            <i class="icon-Search js-header-search-btn-open"></i>
                            <input type="search" placeholder="Search anything" class="form-control" />
                        </label>
                    </form>
                    <div class="header__search-close js-header-search-btn-close"><i class="icon-Cancel"></i></div>
                </div>
                <div class="header__menu">
                    <a class="header__menu__link" href="ask.html">Ask</a>
                </div>
                <div class="header__menu">
                    <a class="header__menu__link" href="posts.html">Blog</a>
                </div>
                <div class="header__menu">
                    <a class="header__menu__link" href="signin.html">Sign In</a>
                </div>
                <div class="header__menu">
                    <a class="header__menu__link" href="signup.html">Sign Up</a>
                </div>
                <div class="header__menu header__dropdown">
                    <div class="header__menu-btn" data-dropdown-btn="menu">
                        Questions <i class="icon-Menu_Icon"></i>
                    </div>
                    <nav class="dropdown dropdown--design-01" data-dropdown-list="menu">
                        <div>
                            <ul class="dropdown__catalog row">
                                <li class="col-xs-6"><a href="questions.html">New</a></li>
                                <li class="col-xs-6"><a href="questions.html">Experts</a></li>
                                <li class="col-xs-6"><a href="questions.html">Tags</a></li>
                                <li class="col-xs-6"><a href="questions.html">Pregnancy</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3>Categories</h3>
                            <ul class="dropdown__catalog row">
                                <li class="col-xs-6"><a href="#" class="category"><i class="bg-5dd39e"></i>Random</a></li>
                                <li class="col-xs-6"><a href="#" class="category"><i class="bg-c49bbb"></i>Science</a></li>
                                <li class="col-xs-6"><a href="#" class="category"><i class="bg-525252"></i>Education</a></li>
                                <li class="col-xs-6"><a href="#" class="category"><i class="bg-777da7"></i>Q&amp;As</a></li>
                                <li class="col-xs-6"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class="dropdown__catalog row">
                                <li class="col-xs-6"><a href="#">Forum Rules</a></li>
                                <li class="col-xs-6"><a href="#">Blog</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="header__user">
                    <div class="header__user-btn" data-dropdown-btn="user">
                        <img src="./assets/fonts/icons/avatars/N.svg" alt="avatar">
                        Nelson Ife<i class="icon-Arrow_Below"></i>
                    </div>
                    <nav class="dropdown dropdown--design-01" data-dropdown-list="user">
                        <div>
                            <div class="dropdown__icons">
                                <a href="#"><i class="icon-Bookmark"></i></a>
                                <a href="#"><i class="icon-Message"></i></a>
                                <a href="#"><i class="icon-Preferences"></i></a>
                                <a href="#"><i class="icon-Logout"></i></a>
                            </div>
                        </div>
                        <div>
                            <ul class="dropdown__catalog">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Badges</a></li>
                                <li><a href="#">My Groups</a></li>
                                <li><a href="#">Notifications</a></li>
                                <li><a href="#">Topics</a></li>
                                <li><a href="#">Likes</a></li>
                                <li><a href="#">Solved</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="header__offset-btn">
                <a href="create-post.html"><img src="./assets/fonts/icons/main/New_Topic.svg" alt="New Blog Post"></a>
            </div>
        </div>
    </header>
    <!-- MAIN -->
    <main>
        <div class="container">
            <div class="create">
                <div class="create__head">
                    <div class="create__title"><img src="./assets/fonts/icons/main/New_Topic.svg" alt="New topic">Create New Post</div>
                </div>
                <div class="create__section">
                    <label class="create__label" for="title">Post Title</label>
                    <input type="text" class="form-control" id="title" />
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="create__section">
                            <label class="create__label" for="category">Select Category</label>
                            <label class="custom-select">
                                <select id="category">
                                    <option>Choose</option>
                                    <option>Choose #2</option>
                                    <option>Choose #3</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="create__section">
                            <label class="create__label" for="sub-category">Select Sub Category</label>
                            <label class="custom-select">
                                <select id="sub-category">
                                    <option>Choose</option>
                                    <option>Choose #2</option>
                                    <option>Choose #3</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="create__section create__textarea">
                    <label class="create__label" for="post">Post</label>
                    <textarea class="form-control" id="post"></textarea>
                </div>
                <div class="create__section">
                    <label class="create__label" for="tags">Add Tags</label>
                    <input type="text" class="form-control" id="tags" placeholder="e.g. nature, science">
                </div>
                <div class="create__footer">
                    <a href="#" class="create__btn-cansel btn">Cancel</a>
                    <a href="#" class="create__btn-create btn btn--type-02">Create Post</a>
                </div>
            </div>
            <section class="page-posts">
                <div class="container">
                    <div class="card-head text-center">
                        <h3 class="h2">Recent Posts.</h3>
                    </div>
                    <div class="posts">
                        <div class="posts__head">
                            <div class="posts__topic">Post</div>
                            <div class="posts__category">Category</div>
                            <div class="posts__users">Tags</div>
                            <div class="posts__replies">Replies</div>
                            <div class="posts__views">Views</div>
                            <div class="posts__activity">Activity</div>
                        </div>
                        <div class="posts__body">
                            <div class="posts__item">
                                <div class="posts__section-left">
                                    <div class="posts__topic">
                                        <div class="posts__content">
                                            <a href="#">
                                                <h3>Current news and discussion</h3>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="posts__category"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
                                </div>
                                <div class="posts__section-right">
                                    <div class="posts__users"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
                                    <div class="posts__replies">31</div>
                                    <div class="posts__views">14.5k</div>
                                    <div class="posts__activity">13d</div>
                                </div>
                            </div>
                            <div class="posts__item bg-f2f4f6">
                                <div class="posts__section-left">
                                    <div class="posts__topic">
                                        <div class="posts__content">
                                            <a href="#">
                                                <h3>Get your username drawn by the other users of unity! or a drawing based on what you do</h3>
                                            </a>
                                            <div class="posts__tags tags">
                                                <a href="#" class="bg-4f80b0">gaming</a>
                                                <a href="#" class="bg-424ee8">nature</a>
                                                <a href="#" class="bg-36b7d7">entertainment</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="posts__category"><a href="#" class="category"><i class="bg-4436f8"></i>Video</a></div>
                                </div>
                                <div class="posts__section-right">
                                    <div class="posts__users"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
                                    <div class="posts__replies">252</div>
                                    <div class="posts__views">396</div>
                                    <div class="posts__activity">13m</div>
                                </div>
                            </div>
                            <div class="posts__item">
                                <div class="posts__section-left">
                                    <div class="posts__topic">
                                        <div class="posts__content">
                                            <a href="#">
                                                <h3>Which movie have you watched most recently?</h3>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="posts__category"><a href="#" class="category"><i class="bg-3ebafa"></i> Exchange</a></div>
                                </div>
                                <div class="posts__section-right">
                                    <div class="posts__users"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
                                    <div class="posts__replies">207</div>
                                    <div class="posts__views">7.5k</div>
                                    <div class="posts__activity">41m</div>
                                </div>
                            </div>
                            <div class="posts__item posts__item--bg-gradient">
                                <div class="posts__section-left">
                                    <div class="posts__topic">
                                        <div class="posts__content">
                                            <a href="#">
                                                <h3><span>This post contails spoiler about</span> Star Wars Movie.</h3>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="posts__category"><a href="#" class="category"><i class="bg-777da7"></i> Q&amp;As</a></div>
                                </div>
                                <div class="posts__section-right">
                                    <div class="posts__users"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
                                    <div class="posts__replies">2.3k</div>
                                    <div class="posts__views">2.0k</div>
                                    <div class="posts__activity">1h</div>
                                </div>
                            </div>
                            <div class="posts__item">
                                <div class="posts__section-left">
                                    <div class="posts__topic">
                                        <div class="posts__content">
                                            <a href="#">
                                                <h3>Take a picture of what you’re doing at this very moment</h3>
                                            </a>
                                            <div class="posts__tags tags">
                                                <a href="#" class="bg-ec008c">selfie</a>
                                                <a href="#" class="bg-7cc576">camera</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="posts__category"><a href="#" class="category"><i class="bg-c6b38e"></i> Pets</a></div>
                                </div>
                                <div class="posts__section-right">
                                    <div class="posts__users"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
                                    <div class="posts__replies">441</div>
                                    <div class="posts__views">3.1k</div>
                                    <div class="posts__activity">6h</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!-- FOOTER -->
    <footer>
        <div class="footer__head">
            <div class="container">
                <div class="row">
                    <div class="footer__links col-sm-12 col-xs-6 col-md-2">
                        <ul>
                            <li class="link__head">Company</li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> About Us</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Careers</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Terms &amp; Conditions</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="footer__links col-sm-12 col-xs-6 col-md-2">
                        <ul>
                            <li class="link__head">Learn More</li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> FAQ</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Q &amp; A</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Learn</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Ask an Expert</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Events</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Site Guidelines</a></li>
                        </ul>
                    </div>
                    <div class="footer__links col-sm-12 col-xs-6 col-md-2">
                        <ul>
                            <li class="link__head">Link Header</li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Link</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Link</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Link</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Link</a></li>
                        </ul>
                    </div>
                    <div class="footer__links col-sm-12 col-xs-6 col-md-2">
                        <ul>
                            <li class="link__head">Link Header</li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Link</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Link</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Link</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Link</a></li>
                        </ul>
                    </div>
                    <div class="footer__links col-sm-12 col-xs-6 col-md-2">
                        <ul>
                            <li class="link__head">Link Header</li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Link</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Link</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Link</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Link</a></li>
                        </ul>
                    </div>
                    <div class="footer__links col-sm-12 col-xs-6 col-md-2">
                        <ul>
                            <li class="link__head">Link Header</li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Link</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Link</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Link</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Link</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <span>2018 &copy; Bluumhealth. All rights reserved.</span>
        </div>
    </footer>
    <!-- JavaScript -->
    <script src="./assets/javascript/jquery.min.js"></script>
    <script src="./assets/javascript/velocity.min.js"></script>
    <script src="./assets/javascript/app.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Single Post | Bluumhealth</title>
    <meta name="description" content="Single Post Page Description" />
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
            <div class="nav">
                <div class="nav__categories js-dropdown">
                    <div class="nav__select">
                        <div class="btn-select" data-dropdown-btn="categories">All Categories</div>
                        <nav class="dropdown dropdown--design-01" data-dropdown-list="categories">
                            <ul class="dropdown__catalog row">
                                <li class="col-xs-6"><a href="#" class="category"><i class="bg-5dd39e"></i>Random</a></li>
                                <li class="col-xs-6"><a href="#" class="category"><i class="bg-c49bbb"></i>Science</a></li>
                                <li class="col-xs-6"><a href="#" class="category"><i class="bg-525252"></i>Education</a></li>
                                <li class="col-xs-6"><a href="#" class="category"><i class="bg-777da7"></i>Q&amp;As</a></li>
                                <li class="col-xs-6"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="nav__select">
                        <div class="btn-select" data-dropdown-btn="tags">Tags</div>
                        <div class="dropdown dropdown--design-01" data-dropdown-list="tags">
                            <div class="tags">
                                <a href="#" class="bg-424ee8">nature</a>
                                <a href="#" class="bg-6f7e9c">funny</a>
                                <a href="#" class="bg-a3d39c">climbing</a>
                                <a href="#" class="bg-8781bd">dreams</a>
                                <a href="#" class="bg-f1ab32">life</a>
                                <a href="#" class="bg-3b96ca">reason</a>
                                <a href="#" class="bg-348aa7">social</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav__menu js-dropdown">
                    <div class="nav__select">
                        <div class="btn-select" data-dropdown-btn="menu">Latest</div>
                        <div class="dropdown dropdown--design-01" data-dropdown-list="menu">
                            <ul class="dropdown__catalog">
                                <li><a href="#">Latest</a></li>
                                <li><a href="#">Unread</a></li>
                                <li><a href="#">Most Liked</a></li>
                            </ul>
                        </div>
                    </div>
                    <ul>
                        <li class="active"><a href="#">Latest</a></li>
                        <li><a href="#">Unread</a></li>
                        <li><a href="#">Most Liked</a></li>
                    </ul>
                </div>
                <div class="nav__thread">
                    <p>Thread Navigation:</p>
                    <a href="#" class="nav__thread-btn nav__thread-btn--prev"><i class="icon-Arrow_Left"></i>Previous</a>
                    <a href="#" class="nav__thread-btn nav__thread-btn--next">Next<i class="icon-Arrow_Right"></i></a>
                </div>
            </div>
            <div class="topics">
                <div class="topics__heading">
                    <h2 class="topics__heading-title">Which movie have you watched most recently?</h2>
                    <div class="topics__heading-info">
                        <a href="#" class="category"><i class="bg-3ebafa"></i> Exchange</a>
                        <div class="tags">
                            <a href="#" class="bg-4f80b0">gaming</a>
                            <a href="#" class="bg-424ee8">nature</a>
                            <a href="#" class="bg-36b7d7">entertainment</a>
                        </div>
                    </div>
                </div>
                <div class="topics__body">
                    <div class="topics__content">
                        <div class="topic">
                            <div class="topic__head">
                                <div class="topic__avatar">
                                    <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/N.svg" alt="avatar"></a>
                                </div>
                                <div class="topic__caption">
                                    <div class="topic__name">
                                        <a href="#">Nelson Ife</a>
                                    </div>
                                    <div class="topic__date"><i class="icon-Watch_Later"></i>06 May, 2017</div>
                                </div>
                            </div>
                            <div class="topic__content">
                                <div class="topic__text">
                                    <p>Welcome to Prey. A lot of this game is going to feel familiar — you’ll see bits and pieces from a dozen well-loved games in its DNA. But that doesn’t mean you’re going to immediately understand how everything works. That’s what we’re here for. Let’s talk about some of the habits you’re going to have to pick up, concepts you’ll have to learn and choices you’re going to be making as you play.</p>
                                    <p>We’re going to break it down into three rough categories: Your world, your enemies (and ways to kill them) and yourself.</p>
                                </div>
                                <div class="topic__footer">
                                    <div class="topic__footer-likes">
                                        <div>
                                            <a href="#"><i class="icon-Upvote"></i></a>
                                            <span>201</span>
                                        </div>
                                        <div>
                                            <a href="#"><i class="icon-Downvote"></i></a>
                                            <span>08</span>
                                        </div>
                                        <div>
                                            <a href="#"><i class="icon-Favorite_Topic"></i></a>
                                            <span>39</span>
                                        </div>
                                    </div>
                                    <div class="topic__footer-share">
                                        <div data-visible="desktop">
                                            <a href="#"><i class="icon-Share_Topic"></i></a>
                                            <a href="#"><i class="icon-Flag_Topic"></i></a>
                                            <a href="#"><i class="icon-Bookmark"></i></a>
                                        </div>
                                        <div data-visible="mobile">
                                            <a href="#"><i class="icon-More_Options"></i></a>
                                        </div>
                                        <a href="#"><i class="icon-Reply_Fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="topic topic--comment">
                            <div class="topic__head">
                                <div class="topic__avatar">
                                    <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/F.svg" alt="avatar"></a>
                                </div>
                                <div class="topic__caption">
                                    <div class="topic__name">
                                        <a href="#">Farawe iLyas</a>
                                    </div>
                                    <div class="topic__date">
                                        <div class="topic__user topic__user--pos-r">
                                            <i class="icon-Reply_Fill"></i>
                                            <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/N.svg" alt="avatar"></a>
                                            <a href="#" class="topic__user-name">Nelson Ife</a>
                                        </div>
                                        <i class="icon-Watch_Later"></i>06 May, 2017
                                    </div>
                                </div>
                            </div>
                            <div class="topic__content">
                                <div class="topic__text">
                                    <p>I am using BootStrap 4, but they are asking me to use PHP framework, which I won't do. My code is secure against SQL injection, XSS and all other attacks, it is well organized, i was using OOP.</p>
                                </div>
                                <div class="topic__footer">
                                    <div class="topic__footer-likes">
                                        <div>
                                            <a href="#"><i class="icon-Upvote"></i></a>
                                            <span>137</span>
                                        </div>
                                        <div>
                                            <a href="#"><i class="icon-Downvote"></i></a>
                                            <span>02</span>
                                        </div>
                                        <div>
                                            <a href="#"><i class="icon-Favorite_Topic"></i></a>
                                            <span>46</span>
                                        </div>
                                    </div>
                                    <div class="topic__footer-share">
                                        <div data-visible="desktop">
                                            <a href="#"><i class="icon-Share_Topic"></i></a>
                                            <a href="#"><i class="icon-Flag_Topic"></i></a>
                                            <a href="#"><i class="icon-Bookmark"></i></a>
                                        </div>
                                        <div data-visible="mobile">
                                            <a href="#"><i class="icon-More_Options"></i></a>
                                        </div>
                                        <a href="#"><i class="icon-Reply_Fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="topic">
                            <div class="topic__head">
                                <div class="topic__avatar">
                                    <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/T.svg" alt="avatar"></a>
                                </div>
                                <div class="topic__caption">
                                    <div class="topic__name">
                                        <a href="#">Tesla</a>
                                    </div>
                                    <div class="topic__date"><i class="icon-Watch_Later"></i>07 May, 2017</div>
                                </div>
                            </div>
                            <div class="topic__content">
                                <div class="topic__text">
                                    <p>Yeah! This is really bad. Rejecting an item because its not using a PHP framework(no matter what the script is doing) is a wrong move I think. There are a lot of people reporting this problem(Rejected because of not using a framework).</p>
                                </div>
                                <div class="topic__footer">
                                    <div class="topic__footer-likes">
                                        <div>
                                            <a href="#"><i class="icon-Upvote"></i></a>
                                            <span>71</span>
                                        </div>
                                        <div>
                                            <a href="#"><i class="icon-Downvote"></i></a>
                                            <span>06</span>
                                        </div>
                                        <div>
                                            <a href="#"><i class="icon-Favorite_Topic"></i></a>
                                            <span>42</span>
                                        </div>
                                        <div>
                                            <a href="#"><i class="icon-Reply_Empty"></i></a>
                                            <span>01</span>
                                        </div>
                                    </div>
                                    <div class="topic__footer-share">
                                        <div data-visible="desktop">
                                            <a href="#"><i class="icon-Share_Topic"></i></a>
                                            <a href="#"><i class="icon-Flag_Topic"></i></a>
                                            <a href="#" class="active"><i class="icon-Already_Bookmarked"></i></a>
                                        </div>
                                        <div data-visible="mobile">
                                            <a href="#"><i class="icon-More_Options"></i></a>
                                        </div>
                                        <a href="#"><i class="icon-Reply_Fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="topic topic--comment">
                            <div class="topic__head">
                                <div class="topic__avatar">
                                    <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/L.svg" alt="avatar"></a>
                                </div>
                                <div class="topic__caption">
                                    <div class="topic__name">
                                        <a href="#">Larry</a>
                                    </div>
                                    <div class="topic__date">
                                        <div class="topic__user topic__user--pos-r">
                                            <i class="icon-Reply_Fill"></i>
                                            <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/T.svg" alt="avatar"></a>
                                            <a href="#" class="topic__user-name">Tesla</a>
                                        </div>
                                        <i class="icon-Watch_Later"></i>07 May, 2017
                                    </div>
                                </div>
                            </div>
                            <div class="topic__content">
                                <div class="topic__text">
                                    <p>Yeah! This is really bad. Rejecting an item because its not using a PHP framework(no matter what the script is doing) is a wrong move I think. There are a lot of people reporting this problem(Rejected because of not using a framework).</p>
                                </div>
                                <div class="topic__footer">
                                    <div class="topic__footer-likes">
                                        <div>
                                            <a href="#"><i class="icon-Upvote"></i></a>
                                            <span>71</span>
                                        </div>
                                        <div>
                                            <a href="#"><i class="icon-Downvote"></i></a>
                                            <span>06</span>
                                        </div>
                                        <div>
                                            <a href="#"><i class="icon-Favorite_Topic"></i></a>
                                            <span>42</span>
                                        </div>
                                        <div>
                                            <a href="#"><i class="icon-Reply_Empty"></i></a>
                                            <span>01</span>
                                        </div>
                                    </div>
                                    <div class="topic__footer-share">
                                        <div data-visible="desktop">
                                            <a href="#"><i class="icon-Share_Topic"></i></a>
                                            <a href="#"><i class="icon-Flag_Topic"></i></a>
                                            <a href="#" class="active"><i class="icon-Already_Bookmarked"></i></a>
                                        </div>
                                        <div data-visible="mobile">
                                            <a href="#"><i class="icon-More_Options"></i></a>
                                        </div>
                                        <a href="#"><i class="icon-Reply_Fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="topics__title"><i class="icon-Watch_Later"></i>This topic will has been closed.</div>
                <div class="topics__control">
                    <a href="#" class="btn"><i class="icon-Bookmark"></i>Bookmark</a>
                    <a href="#" class="btn"><i class="icon-Share_Topic"></i>Share</a>
                    <a href="#" class="btn btn--type-02" data-visible="desktop"><i class="icon-Reply_Fill"></i>Reply</a>
                </div>
                <div class="topics__title">Suggested Questions</div>
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
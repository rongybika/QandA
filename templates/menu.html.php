<div class="top-bar-container">
    <div class="container">
        <nav id="menu" class="">
            <label for="tm" id="toggle-menu">Navigation <span class="drop-icon">▾</span></label>
            <input type="checkbox" id="tm" onclick="myFunction()">
            <ul class="main-menu cf">
                <li><a href="/">Home</a></li>
                <li><a href="/random">Random</a></li>
                <li><a href="/addquestion">Add Question</a></li>
                <!--<li>
                    <a href="#">Categories
                    <span class="drop-icon">▾</span>
                    <label title="Toggle Drop-down" class="drop-icon" for="sm8">▾</label>
                    </a>
                    <input type="checkbox" id="sm8">
                    <ul class="sub-menu">
                        <li><a href="">4.1</a></li>
                        <li><a href="">4.2</a></li>
                        <li><a href="">4.2</a></li>
                        <li><a href="">4.4</a></li>
                    </ul>
                </li>-->
                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/login">Login</a></li>
                <li>
                    <div class="searchbox">
                        <button id="header-search-toggle" type="button" class="header-search__toggle" title="Search" aria-controls="header-search" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-search fa-2x"></i>
                        </button>
                        <div id="header-search" class="header-search header-search--ajaxed" role="group" aria-expanded="false" style="display: none;">
                            <div class="header-search__inner">
                                <form class="navbar-form navbar-right" role="search" accept-charset="UTF-8" action="/search" method="GET">
                                    <div class="tn-searchtop px-4 py-3">
                                        <button type="button" class="btn btn-default js-btn-searchtop">
                                        <i class="fa fa-times header-search__form-close-button"></i>
                                        </button>
                                        <div class="form-group">
                                            <input type="text" class="form-control" size="35" placeholder="Search..." name="qu">
                                            <button type="submit" class="btn btn-default">
                                            <i class="fa fa-search fa-2x search_form_submit"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <span class="header-search__arrow" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<div id="left_panel__overlay" class="left_panel__overlay" onclick="myFunction()"></div>
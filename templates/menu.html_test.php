<div class="top-bar-container">
    <nav class="top-bar-container">
        <div class="next-container">
            <div class="navbar _fixed wmx12 mx-auto ai-center grid">
                <div class="navbar-container" id="myTopnav">
                <ul class="nav-items">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="/random">Random</a>
                    </li>
                    <li>
                    <a href="/addquestion">Add Question</a>
                    </li>
                    <li>
                    <a href="/contact">Contact</a>
                    </li>
                    <li>
                    <a href="/login">Login</a>
                    <div class="submenu">
                        <ul>
                            <li>
                                <a href="/submenu">Submenu</a>
                            </li>
                            <li>
                                <a href="/submenu">Submenu</a>
                            </li>
                            <li>
                                <a href="/submenu">Submenu</a>
                            </li>
                        </ul>
                    </div>
                    </li>
                    <li>
                    <a href="/about">About Us</a>
                    </li>
                    <li class="">
                    <a class="with-child" href="/categories">Categories<span class="drop-icon">▾</span></a>
                    <div class="submenu">
                        <ul>
                            <li>
                                <a href="/submenu">Submenu</a>
                            </li>
                            <li>
                                <a href="/submenu">Submenu</a>
                            </li>
                            <li>
                                <a href="/submenu">Submenu</a>
                            </li>
                        </ul>
                    </div>
                    </li>
                    <!--<li>
                    <a class="with-child" href="/search">Search<span class="drop-icon">▾</span></a>
                    <div class="submenu">
                        <div class="search-container-mobile">
                            <form id="searchForm" method="GET" action="/search">
                                <div class="searchbox">
                                    <label for="qu" class="qu-label" aria-label="Search"></label>
                                    <input class="input-res" type="text" id="qu" name="qu" placeholder="Search...">
                                    <button type="submit" style=""><i class="fa fa-search fa-2x"></i></button>
                                    
                                    
                                    
                                    
                                        
                                        
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    </li>-->
                    <li>
                    <div class="searchbox">
                            <!--<label for="qu" class="qu-label" aria-label="Search"></label>
                            <input class="input-res" type="text" id="qu" name="qu" placeholder="Search...">-->
                            <!--<button type="submit" style=""><i class="fa fa-search fa-2x"></i></button>-->
                            
                            <button id="header-search-toggle" type="button" class="header-search__toggle" title="Search" aria-controls="header-search" aria-haspopup="true" aria-expanded="false">
                                         <!--<i class="header-search__toggle-icon" aria-hidden="true"></i>-->
                                         <!--<i class="fa fa-search"></i>-->
                                         <!--<i class="fas fa-search"></i>-->
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
                                                                <input type="text" class="form-control" size="35" placeholder="Search..." name="q">
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
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()" aria-label="Menu">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <!--<div class="search-container">-->
                
                    <!--<form id="searchForm" method="GET" action="/search">-->
                        
                    <!--</form>->
                <!--</div>-->
            </div>
        </div>
    </nav>
<div id="left_panel__overlay" class="left_panel__overlay" onclick="myFunction()"></div>

<!--<div>
<nav id="menu" class="">
  <label for="tm" id="toggle-menu">Navigation <span class="drop-icon">▾</span></label>
  <input type="checkbox" id="tm">
  <ul class="main-menu cf">
    <li><a href="#">Sample</a></li>
    <li><a href="#">Dropdown
        <span class="drop-icon">▾</span>
        <label title="Toggle Drop-down" class="drop-icon" for="sm0">▾</label>
      </a>
      <input type="checkbox" id="sm0">
      <ul class="sub-menu">
        <li><a href="#">Item 1.1</a></li>
        <li><a href="#">Item 1.2</a></li>
        <li><a href="#">Item 1.3</a></li>
        <li><a href="#">Item 1.4</a></li>
      </ul>
    </li>
    <li><a href="#">2-level DD 
        <span class="drop-icon">▾</span>
        <label title="Toggle Drop-down" class="drop-icon" for="sm1">▾</label>
      </a>
      <input type="checkbox" id="sm1">
      <ul class="sub-menu">
        <li><a href="#">Item 2.1</a></li>
        <li><a href="#">Item 2.2
            <span class="drop-icon">▸</span>
            <label title="Toggle Drop-down" class="drop-icon" for="sm2">▾</label>
          </a>
          <input type="checkbox" id="sm2">
          <ul class="sub-menu">
            <li><a href="#">Item 2.2.1</a></li>
            <li><a href="#">Item 2.2.2</a></li>
            <li><a href="#">Item 2.2.3</a></li>
          </ul>
        </li>
        <li><a href="#">Item 2.3</a></li>
      </ul>
    </li>
    <li><a href="#">Multiple Levels
        <span class="drop-icon">▾</span>
        <label title="Toggle Drop-down" class="drop-icon" for="sm3">▾</label>
    </a>
    <input type="checkbox" id="sm3">
    <ul class="sub-menu">
      <li><a href="">3.1
        <span class="drop-icon">▸</span>
        <label title="Toggle Drop-down" class="drop-icon" for="sm4">▾</label>
      </a>
      <input type="checkbox" id="sm4">
        <ul class="sub-menu">
          <li><a href="">3.1.1</a></li>
          <li><a href="">3.1.2</a></li>
          <li><a href="">3.1.3</a></li>
          <li><a href="">3.1.4</a></li>
        </ul>
      </li>
      <li><a href="">3.2
        <span class="drop-icon">▸</span>
        <label title="Toggle Drop-down" class="drop-icon" for="sm5">▾</label>
      </a>
      <input type="checkbox" id="sm5">
      
        <ul class="sub-menu">
          <li><a href="">3.2.1</a></li>
          <li><a href="">3.2.2</a></li>
          <li><a href="">3.2.3</a></li>
        </ul>
      </li>
      <li><a href="">3.3
          <span class="drop-icon">▸</span>
            <label title="Toggle Drop-down" class="drop-icon" for="sm6">▾</label>
          </a>
          <input type="checkbox" id="sm6">
      
        <ul class="sub-menu">
          <li><a href="">3.3.1</a></li>
          <li><a href="">3.3.2</a></li>
          <li><a href="">3.2.2</a></li>
          <li><a href="">3.3.4</a></li>
          <li><a href="">3.3.5</a></li>
        </ul>
      </li>
    </ul>
    </li>
    <li><a href="#">Sample #2</a></li>
    <li><a href="#">Another DD
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
    </li>
  </ul>
</nav>
</div>-->

</div>
<!--<div class="top-bar-container2">
    <nav class="top-bar-container22">
        <div class="next-container">
            <div class="navbar _fixed wmx12 mx-auto ai-center grid">
                <div class="navbar-container" id="myTopnav2">
                    <a href="/">Home</a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction2()" aria-label="Menu">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>-->
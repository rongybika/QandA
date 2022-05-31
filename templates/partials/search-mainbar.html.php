<h1 class="grid--cell fl1 fs-headline1 mb0">Search Results for "<?php echo $keywordOrig ?>"</h1>
<form id="bigSearchForm" method="GET" action="/search">
    <div class="searchbox">
        <input class="input-res" type="text" name="qu" placeholder="Search...">
        <button type="submit" style="" class="submit-button"><i class="fa fa-search fa-2x"></i></button>
    </div>
    <input type="submit" style="display: none;" />
</form>
<span style="color:rgb(250, 2, 2)"></span>
<div class="grid ai-center mb16"><?php echo $totalRowsOrig ?> results</div>
<div class="js-search-result flush-left">
    <div>
        <?php if (count($answers) > 0) { ?>

            <?php foreach ($answers as $item) { ?>
                <div class="question-summary search-result">
                    <div class="summary">
                        <div class="result-link">
                            <h3>
                                <a class="question-hyperlink" href="/q/<?php echo $item['id'] ?>/<?php echo $item['url_f_title'] ?>"><?php echo $item['title'] ?></a>
                            </h3>
                        </div>
                        <div class="excerpt"><?php echo $item['excerpt'] ?>...</div>
                        <div class="post-signature owner grid--cell">
                            <div class="user-info ">
                                <div class="user-action-time">asked
                                    <span itemprop="dateCreated" itemscope="" itemtype="http://schema.org/Question" class="relativetime"><?php echo $item['created_date'] ?> at
                                        <?php echo $item['created_time'] ?></span>
                                </div>
                                <div class="user-details">
                                    <a itemprop="author" itemscope="" itemtype="http://schema.org/Person" href="/user-details/<?php echo $item['nickname'] ?>"><?php echo $item['nickname'] ?></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="statscontainer clearfix">
                        <div class="stats">
                            <div class="vote">
                                <div class="votes answered">
                                    <span class="vote-count-post "><strong><?php echo $item['views'] ?></strong></span>
                                    <div class="viewcount">views</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        <?php } ?>
    </div>
</div>

<div class="pager fl">
    <div class="pb-3">
        ( Page <?php echo $currentPage ?> of <?php echo $totalPages ?> )
    </div>
    <div class="pagination">
        <?php if ($currentPage == 1) { ?>
        <?php } else { ?> <a href='search?qu=<?php echo $keywordOrig ?>&page=1'>
                <<</a> <?php $prevpage = $currentPage - 1; ?> <a href='search?qu=<?php echo $keywordOrig ?>&page=<?php echo $prevpage ?>'>
                    <</a> <?php } ?> <?php if ($currentPage == $totalPages) { ?> <?php } else {
                                                                                    $nextpage = $currentPage + 1; ?> <a href='search?qu=<?php echo $keywordOrig ?>&page=<?php echo $nextpage ?>'>>
            </a>
            <a href='search?qu=<?php echo $keywordOrig ?>&page=<?php echo $totalPages ?>'>>></a>
        <?php } ?>
    </div>
</div>
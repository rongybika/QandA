<div class="container">
<h1 class="grid--cell fl1 fs-headline1 mb0">Question list</h1>
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
                        <div class="excerpt">
                            <?php echo $item['excerpt'] . "..."; ?>
                        </div>
                        <div class="started fr">
                            <!--<span>asked <?php /*echo $item['created_date']*/ ?> by <?php /*echo $item['nickname']*/ ?></span>-->
                        </div>
                    </div>
                    <div class="statscontainer">
                        <div class="stats">
                            <div class="vote">
                                <div class="votes answered">
                                    <span class="vote-count-post "><strong><?php echo $item['viewed'] ?></strong></span>
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
        <?php } else { ?> <a href='home?page=1'>
                <<</a> <?php $prevpage = $currentPage - 1; ?> <a href='home?page=<?php echo $prevpage ?> '>
                    <</a> <?php } ?> <?php if ($currentPage == $totalPages) { ?> <?php } else {
                                                                                    $nextpage = $currentPage + 1; ?> <a href='home?page=<?php echo $nextpage ?> '>>
            </a>
            <a href='home?page=<?php echo $totalPages ?> '>>></a>
        <?php } ?>
    </div>
</div>
</div>
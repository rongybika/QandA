<h1 class="grid--cell fl1 fs-headline1 mb0">Random Questions</h1>
<span style="color:rgb(250, 2, 2)"></span>
<div class="grid ai-center mb16"><?php echo count($answersArr["records"]); ?> results</div>
<div class="js-search-result flush-left">
    <div>
        <?php if (count($answersArr["records"]) > 0) { ?>

            <?php foreach ($answersArr["records"] as $item) { ?>
                <div class="question-summary search-result">
                    <div class="summary">
                        <div class="result-link">
                            <h3>
                                <a class="question-hyperlink" href="/q/<?php echo $item['id'] ?>/<?php echo $item['url_f_title'] ?>"><?php echo $item['title'] ?></a>
                            </h3>
                        </div>
                        <div class="excerpt"><?php echo $item['excerpt'] ?>...</div>
                        <div class="started fr">
                            <!--<span>asked <?php /*echo $item['created_date']*/ ?> by <?php /*echo $item['nickname']*/ ?></span>-->
                        </div>
                    </div>
                    <div class="statscontainer">
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
<h1 class="grid--cell fl1 fs-headline1 mb0">Search Results for "<?php echo $keywordOrig ?>"</h1>
<form id="bigSearchForm" method="GET" action="/search">
    <div class="searchbox">
        <input class="input-res" type="text" name="qu" placeholder="Search...">
    </div>
    <input type="submit" style="display: none;" />
</form>
<span style="color:rgb(250, 2, 2)"></span>
<div class="grid ai-center mb16 no-result"><?php echo $totalRowsOrig ?> results</div>
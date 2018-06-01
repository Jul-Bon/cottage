

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
    <button type="submit" id="searchsubmit" value="найти"><i class="fa fa-search" aria-hidden="true"></i></button>
    <label class="screen-reader-text" for="s">Поиск: </label>
    <input type="text" class="search-input" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Search...">
</form>
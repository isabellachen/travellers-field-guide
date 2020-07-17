<form class="search-form" action="/" method="get" role="search">
  <input type="search" name="s" class="search-field" id="search" placeholder="Search …" value="<?php the_search_query(); ?>" />
  <input class="search-icon" type="image" alt="Search" src="<?php bloginfo('template_url'); ?>/assets/icons/search.svg" />
</form>
<div class="related_list">
    <h3>Related Post</h3>
    <?php $categories = get_the_category($post->ID);
    if ($categories) {
        $category_ids = array();
        foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;
        $args = array(
            'category__in' => $category_ids,
            'orderby' => rand,
            'post__not_in' => array($post->ID),
            'showposts' => 3,
            'caller_get_posts' => 1);
        $my_query = new wp_query($args);
        if ($my_query->have_posts()) {


            echo '<ul class="clearfix">';
            while ($my_query->have_posts()) {
                $my_query->the_post();
                ?>
                <li class="related-post">
                    <?php cottage_post_thumbnail(); ?>
                    <div class="related_post_headline">
                        <h4 class="related_post_title">
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h4>
                        <span class="posted-meta">
                            <?php cottage_posted_by(); ?>
                        </span><!-- .entry-meta -->
                        <span class="comments">
                            <?php comments_number('0 comment', '1 comment', '% comments'); ?>
                    </span>
                    </div>

                    <div class="related_post_content"><?php echo mb_substr(strip_tags(get_the_content()), 0, 160); ?></div>
                    <a href="<?php the_permalink(); ?>" class="button">Read more</a>
                </li>
                <?php
            }
            echo '</ul>';
        }
        wp_reset_query();
    }
    ?>
</div>
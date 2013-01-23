<section class="post">
    <?php if (!empty($content['field_image'])): ?>
        <div class="postimg">
            <div class="pic2">
                <?php
                print render($content['field_image']);
                ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($display_submitted): ?>
        <div class="entry-date">
            <div class="posttime">
                <h1><?php print format_date($node->created, 'custom', 'd'); ?></h1>
                <h3><?php print format_date($node->created, 'custom', 'M Y'); ?></h3>
            </div>
            
        </div>
    <?php endif; ?>


    <div class="entry-text">
        <h3 class="posttitle"><a href="<?php print $node_url; ?>"><?php print $node->title; ?></a></h3>
        <div class="entry-content">
            <?php
            hide($content['field_category']);
            hide($content['links']);
            hide($content['field_tags']);
            print render($content);
            ?>

            <a href="<?php print $node_url; ?>" class="more"><?php print t('L&#228;s mer'); ?></a> </div>
    </div>
</section>
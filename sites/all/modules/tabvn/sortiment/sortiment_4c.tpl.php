<?php
require_once 'sortiment_filter.tpl.php';
?>

<?php if (!empty($nodes)): ?>
  <div class="portfolio-grid">
    <ul id="thumbs">
      <?php foreach ($nodes as $node) : ?>
        <?php
        $image_full = '';
        if (!empty($node->field_images[LANGUAGE_NONE][0]['uri'])) {
          $image_full = file_create_url($node->field_images[LANGUAGE_NONE][0]['uri']);
        }
        ?>
        <li class="col4 item <?php print sortiment_format_terms('field_sortiment_category', $node); ?>">
          <div class="view view-tenth"> 
            <?php
            $image_uri = $node->field_images[LANGUAGE_NONE][0]['uri'];
            $image_url = file_create_url($image_uri);
            $style_name = 'portfolio_item';
            $node_url = url('node/' . $node->nid);
            print theme('image_style', array('style_name' => $style_name, 'path' => $image_uri));
            ?>
            <div class="mask">
              <div class="mask-inner">
                <h2><?php print l($node->title, 'node/'.$node->nid); ?></h2>
                <p><?php print custom_trim_text(array('max_length' => 100, 'html' => true, 'ellipsis' => true), $node->body[LANGUAGE_NONE][0]['value']); ?></p>
                <a href="<?php print $image_full; ?>" class="preview info" data-rel="prettyPhoto[web]"><?php print t('preview'); ?></a> </div>
            </div>
          </div>
        </li>
      <?php endforeach; ?>

    </ul>
  </div>
<?php endif; ?>
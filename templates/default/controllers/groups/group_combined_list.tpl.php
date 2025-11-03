<?php if (!empty($items)) { ?>
    <div class="group_combined_list">
        <h3><?php echo LANG_CONTENT; ?></h3>
        <ul class="group_combined_list__items">
            <?php foreach ($items as $item) { ?>
                <li>
                    <a href="<?php echo $item['url']; ?>"><?php html($item['title']); ?></a>
                    <span class="meta">(<?php echo $item['ctype_title']; ?>, <?php echo string_date_age_max($item['date_pub'], true); ?>)</span>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>


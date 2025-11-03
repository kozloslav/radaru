<?php
/**
 * Template Name: LANG_CP_LISTVIEW_STYLE_BASIC
 * Template Type: content
 */
if($ctype['options']['list_show_filter']) {
    $this->renderAsset('ui/filter-panel', [
        'css_prefix'   => $ctype['name'],
        'page_url'     => $page_url,
        'fields'       => $fields,
        'props_fields' => $props_fields,
        'props'        => $props,
        'filters'      => $filters,
        'ext_hidden_params' => $ext_hidden_params,
        'is_expanded'  => $ctype['options']['list_expand_filter']
    ]);
}
?>

<?php if (!$items){ ?>
    <p class="alert alert-info mt-4 alert-list-empty">
        <?php if(!empty($ctype['labels']['many'])){ ?>
            <?php echo sprintf(LANG_TARGET_LIST_EMPTY, $ctype['labels']['many']); ?>
        <?php } else { ?>
            <?php echo LANG_LIST_EMPTY; ?>
        <?php } ?>
    </p>
<?php return; } ?>

<div class="content_list default_list <?php echo $ctype['name']; ?>_list mt-3 mt-lg-4">

    <?php foreach($items as $item){ ?>
        <div class="content_list_item <?php echo $ctype['name']; ?>_list_item r-content_list_item clearfix" data-link="<?php echo href_to($ctype['name'], $item['slug'].'.html'); ?>">
            <div class="bar-info r-mobile">

                <div class="bar">
                    <div class="r-date">
                        <?php if (!empty($item['info_bar']['date_pub']['icon'])){ ?>
                            <?php html_svg_icon('solid', $item['info_bar']['date_pub']['icon']); ?>
                        <?php } ?>

                        <?php echo $item['info_bar']['date_pub']['html']; ?>
                    </div>
                    <div class="r-user">

                        <?php if (!empty($item['info_bar']['user']['icon'])){ ?>
                            <?php html_svg_icon('solid', $item['info_bar']['user']['icon']); ?>
                        <?php } ?>
                        <?php if (!empty($item['info_bar']['user']['href'])){ ?>
                            <a class="r-content_link" href="<?php echo $item['info_bar']['user']['href']; ?>">
                                <?php echo $item['info_bar']['user']['html']; ?>
                            </a>
                        <?php } else { ?>
                            <?php echo $item['info_bar']['user']['html']; ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="r-rating">
                    <?php 
                    $desktop_rating_html = $item['info_bar']['rating']['html'];
                    // Добавляем уникальный ID для десктопной версии
                    $desktop_rating_html = str_replace('id="rating-'.$item['ctype_name'].'-'.$item['id'].'"', 'id="rating-'.$item['ctype_name'].'-'.$item['id'].'-desktop"', $desktop_rating_html);
                    echo $desktop_rating_html;
                    ?>
                </div>
            </div>
            <div class="r-content_list">
                <div class="icms-content-left-column">
                    <?php if (isset($item['fields']['photo'])) { ?>
                        <?php echo $item['fields']['photo']['html']; ?>
                    <?php } ?>

                </div>
                <div class="icms-content-right-column">
                    <div class="bar-info r-nmobile">

                        <div class="bar">
                            <div class="r-date">
                                <?php if (!empty($item['info_bar']['date_pub']['icon'])){ ?>
                                    <?php html_svg_icon('solid', $item['info_bar']['date_pub']['icon']); ?>
                                <?php } ?>

                                <?php echo $item['info_bar']['date_pub']['html']; ?>
                            </div>
                            <div class="r-user">


                                <?php if (!empty($item['info_bar']['user']['href'])){ ?>
                                    <a class="r-content_link" href="<?php echo $item['info_bar']['user']['href']; ?>">
                                        <?php if (!empty($item['info_bar']['user']['icon'])){ ?>
                                            <?php html_svg_icon('solid', $item['info_bar']['user']['icon']); ?>
                                        <?php } ?>
                                        <?php echo $item['info_bar']['user']['html']; ?>
                                    </a>
                                <?php } else { ?>
                                    <?php echo $item['info_bar']['user']['html']; ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="r-rating">
                            <?php print_r($item['info_bar']['rating']['html']); ?>
                        </div>
                    </div>
                    <div class="r-nmobile">


                        <?php if (isset($item['fields']['title'])) { ?>


                            <?php $desktop_title = mb_substr($item['fields']['title']['html'], 0, 80, 'UTF-8');
                            if (mb_strlen($item['fields']['title']['html'], 'UTF-8') > 80) {
                                $desktop_title .= '...';
                            }?>

                            <a class="r-content_title" href="<?php echo href_to($ctype['name'], $item['slug'].'.html'); ?>">
                                <?php echo $desktop_title; ?>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="r-mobile">
                        <?php if (isset($item['fields']['title'])) { ?>


                            <?php $desktop_title = mb_substr($item['fields']['title']['html'], 0, 40, 'UTF-8');
                            if (mb_strlen($item['fields']['title']['html'], 'UTF-8') > 40) {
                                $desktop_title .= '...';
                            }?>

                            <a class="r-content_title" href="<?php echo href_to($ctype['name'], $item['slug'].'.html'); ?>">
                                <?php echo $desktop_title; ?>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="r-nmobile">
                        <?php if (isset($item['fields']['content'])) { ?>


                            <?php $desktop_text = mb_substr($item['content'], 0, 120, 'UTF-8');
                            if (mb_strlen($item['content'], 'UTF-8') > 120) {
                                $desktop_text .= '...';
                                echo $desktop_text;
                            }?>

                        <?php } ?>
                    </div>
                    <div class="price_market">
                        <div class="r-price">
                            <?php if (isset($item['fields']['price'])) { ?>
                                <?php echo $item['fields']['price']['html']; ?>₽ ·
                            <?php } ?>
                        </div>
                        <div class="r-market">
                            <?php if ($item['parent_type'] == 'group') { ?>
                                <a href="<?php echo $item['parent_url']; ?>" class="r-content_link r-parent-title"><?php echo $item['parent_title']; ?></a>
                                <?php if (!empty($item['parent_url_market'])) { ?>
                                    <br><a href="<?php echo $item['parent_url_market']; ?>" class="r-content_link r-parent-url-market" target="_blank"><?php echo $item['parent_url_market']; ?></a>
                                <?php } ?>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="r-list-button r-nmobile">



                        <div class="r-list-button-left">
                            <div class="share-btn r-list-btn ajax-modal"
                                 data-url="<?php echo urlencode('https://radaru.ru' . href_to($ctype['name'], $item['slug'].'.html')); ?>"
                                 data-title="<?php echo urlencode($item['title']); ?>"
                                 data-style="sm"
                                 data-item-id="<?php echo $item['id']; ?>">
                                <span class="r-list-icon"><?php html_svg_icon('solid', 'share'); ?></span>
                            </div>
                            <div class="r-list-btn r-list-btn-comm"> <span class="r-list-icon"><?php html_svg_icon('solid', 'comments'); ?></span><?php echo $item['info_bar']['comments']['html']; ?></div>

                        </div>
                        <div class="r-list-button-right">

                            <?php if (isset($item['sale_url'])) { ?>
                                <a href="<?php echo $item['sale_url']; ?>" class="r-content_link r-sale-url">К скидке</a>
                            <?php } ?>
                        </div>
                    </div>

                </div>

            </div>
            <div class="r-mobile mobile_p">
                <?php if (isset($item['fields']['content'])) { ?>


                    <?php $desktop_text = mb_substr($item['content'], 0, 120, 'UTF-8');
                    if (mb_strlen($item['content'], 'UTF-8') > 120) {
                        $desktop_text .= '...';
                        echo $desktop_text;
                    }?>

                <?php } ?>
            </div>
            <div class="r-list-button r-mobile">
                <div class="r-list-button-left">
                    <div class="share-btn r-list-btn ajax-modal"
                         data-url="<?php echo urlencode('https://radaru.ru' . href_to($ctype['name'], $item['slug'].'.html')); ?>"
                         data-title="<?php echo urlencode($item['title']); ?>"
                         data-style="sm"
                         data-item-id="<?php echo $item['id']; ?>">
                        <span class="r-list-icon"><?php html_svg_icon('solid', 'share'); ?></span>
                    </div>
                    <div class="r-list-btn r-list-btn-comm"> <span class="r-list-icon"><?php html_svg_icon('solid', 'comments'); ?></span><?php echo $item['info_bar']['comments']['html']; ?></div>

                </div>
                <div class="r-list-button-right">

                    <?php if (isset($item['sale_url'])) { ?>
                        <a href="<?php echo $item['sale_url']; ?>" class="r-content_link r-sale-url">К скидке</a>
                    <?php } ?>
                </div>
            </div>
        </div>


    <?php } ?>
</div>
<?php echo html_pagebar($page, $perpage, $total, $page_url, $filter_query); ?>

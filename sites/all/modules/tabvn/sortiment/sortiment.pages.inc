<?php

function sortiment_default_page($type = NULL) {


    global $user;

    $default_sortiment = $type;
    if (empty($type)) {
        $default_sortiment = theme_get_setting('default_portfolio', 'proma');
    }



    $sortiment_type_arr = array('4c', '3c', '2c', '1c');
    $build = array();



    if (in_array($default_sortiment, $sortiment_type_arr)) {


        $query = db_select('node', 'n')->extend('PagerDefault');
        $nids = $query
                ->fields('n', array('nid', 'sticky', 'created'))
                ->condition('type', 'sortiment')
                ->condition('status', 1)
                ->orderBy('sticky', 'DESC')
                ->orderBy('created', 'DESC')
                ->limit(theme_get_setting('default_nodes_portfolio', 'proma'))
                ->addTag('node_access')
                ->execute()
                ->fetchCol();

        if (!empty($nids)) {
            $nodes = node_load_multiple($nids);
            $build += array('nodes' => array(
                    '#theme' => 'sortiment_' . $default_sortiment,
                    '#nodes' => $nodes,
                    )); //theme('portfolio_' . $default_portfolio, array('nodes' => $nodes));
            $build['pager'] = array(
                '#theme' => 'pager',
                '#weight' => 5,
            );
        } else {
            drupal_set_message(t('Inga poster i sortimentet.'));
        }
    } else {

        drupal_set_message(t('Inga poster i sortimentet.'));
    }

    return $build;
}
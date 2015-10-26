<?php

return array(

    'name' => 'widget/item-list',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'item-list',
        'label' => 'Item List',
        'core'  => true,
        'icon'  => 'plugins/widgets/item-list/widget.svg',
        'view'  => 'plugins/widgets/item-list/views/widget.php',
        'item'  => array('title', 'content', 'media'),
        'settings' => array(
            'img_size'           => '150',
            'class'              => ''
        )

    ),

    'events' => array(

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('item-list.edit', 'plugins/widgets/item-list/views/edit.php', true);
        }

    )

);

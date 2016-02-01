<?php

return array(

    'name' => 'widget/custom-widget',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'custom-widget',
        'label' => 'Custom Widget',
        //'core'  => true,
        'icon'  => 'plugins/widgets/custom-widget/widget.svg',
        'view'  => 'plugins/widgets/custom-widget/views/widget.php',
        'item'  => array('title', 'content', 'media'),
        'settings' => array(
            'ivm_text'                  => 'Default Value',
            'ivm_select'                => 'option-1',
            'class'             => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {
        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('custom-widget.edit', 'plugins/widgets/custom-widget/views/edit.php', true);
        }

    )

);

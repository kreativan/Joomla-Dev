<?php

return array(

    'name' => 'widget/team',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'team',
        'label' => 'Team',
        'core'  => true,
        'icon'  => 'plugins/widgets/team/widget.svg',
        'view'  => 'plugins/widgets/team/views/widget.php',
        'item'  => array('title', 'content', 'media'),
        'settings' => array(
            'img_size'           => '150',
            'class'              => ''
        )

    ),

    'events' => array(

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('team.edit', 'plugins/widgets/team/views/edit.php', true);
        }

    )

);

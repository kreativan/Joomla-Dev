<?php

return array(

    'name' => 'content/team_member',

    'main' => 'YOOtheme\\Widgetkit\\Content\\Type',

    'config' => array(

        'name'  => 'team_member',
        'label' => 'Team Member',
        'icon'  => 'assets/images/content-placeholder.svg',
        'item'  => array('title', 'content', 'media', 'position', 'linkedin', 'twitter'),
        'data'  => array(
            'items' => array()
        )

    ),

    'items' => function($items, $content, $app) {
        if (is_array($content['items'])) {
            foreach ($content['items'] as $data) {
                if (isset($data['content'])) {
                    $data['content'] = $app['filter']->apply($data['content'], 'content');
                }
                $items->add($data);
            }
        }

    },

    'events' => array(

        'init.admin' => function($event, $app) {
            $app['scripts']->add('widgetkit-team_member-controller', 'plugins/content/team_member/assets/controller.js');
            $app['angular']->addTemplate('team_member.edit', 'plugins/content/team_member/views/edit.php', true);
        }

    )

);

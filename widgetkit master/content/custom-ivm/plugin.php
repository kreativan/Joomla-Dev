<?php

return array(

    'name' => 'content/custom-ivm',

    'main' => 'YOOtheme\\Widgetkit\\Content\\Type',

    'config' => array(

        'name'  => 'custom-ivm',
        'label' => 'Custom ivm',
        'icon'  => 'assets/images/content-placeholder.svg',
        'item'  => array('title', 'subtitle', 'icon','content', 'media'),
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
            $app['scripts']->add('widgetkit-custom-ivm-controller', 'plugins/content/custom-ivm/assets/controller.js');
            $app['angular']->addTemplate('custom-ivm.edit', 'plugins/content/custom-ivm/views/edit.php', true);
        }

    )

);

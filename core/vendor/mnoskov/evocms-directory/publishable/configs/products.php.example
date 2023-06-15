<?php

return [
    /**
     * список идентификаторов ресурсов
     */
    'ids' => [],

    'lang' => [
        'documents_list' => 'Список товаров',
        'create_child' => 'Добавить товар',
    ],

    'columns' => [
        'image' => [
            /**
             * название колонки
             */
            'caption' => '',

            'filterable' => false,

            /**
             * функция рендера ячейки
             *
             * string      $value  значение поля
             * SiteContent $row    строка из таблицы site_content
             * array       $config этот массив конфигурации
             */
            'renderer' => function($value, $row, $config) {
                if (!$row->isfolder) {
                    return '<img src="' . MODX_BASE_URL . \Helper::phpThumb($value, 'w=32,h=32,f=jpg') . '">';
                }
            },
            /**
             * по умолчанию колонки сортируются по порядку,
             * но для каждой колонки можно его поменять.
             * в данном случае колонка встанет перед колонки с названием
             */
            'sort'  => -1,
            /**
             * атрибуты ячейки таблицы
             */
            'attrs' => 'style="width: calc(32px + 1.1rem);"',
            /**
             * имена классов ячейки таблицы
             */
            'class' => 'text-center',
        ],

        'price' => [
            'caption' => 'Цена',
            'class' => 'text-center',
        ],
    ],
];

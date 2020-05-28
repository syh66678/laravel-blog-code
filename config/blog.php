<?php
return [
    'name' => "我的博客",
    'title' => "我的博客嘿嘿",
    'subtitle' => '没啥主题',
    'description' => '没啥可描述的呀，词穷',
    'author' => '东方不败',
    'page_image' => 'home-bg.jpg',
    'posts_per_page' => 5,
    'rss_size' => 25,
    'uploads' => [
        'storage' => 'public',
        'webpath' => '/storage/uploads',
    ],
    'contact_email'=>env('MAIL_FROM'),
];

Neditor extension for laravel-admin
======

这是一个`laravel-admin`扩展，用来将`Neditor`集成进`laravel-admin`的表单中.  
基于 [Neditor](https://github.com/notadd/neditor) , 参考 [laravel-admin-extensions/wangEditor](https://github.com/laravel-admin-extensions/wangEditor) 

## 截图

![wx20180904-103609](https://raw.githubusercontent.com/ssiapp/assets/master/neditor.png)

## 安装
在composer.json增加  

```json
"laravel-admin-ext-neditor": {
    "type": "vcs",
    "url": "[当前git]"
}
```

```bash
composer require ssiapp/laravel-admin-ext-neditor
```

然后
```bash
php artisan vendor:publish  --provider="Encore\NEditor\NEditorServiceProvider"
```

## 配置

在`config/admin.php`文件的`extensions`，加上属于这个扩展的一些配置
```php

    'extensions' => [

        'neditor' => [
        
            // 如果要关掉这个扩展，设置为false
            'enable' => true,
            
            // 编辑器的配置
            'config' => [
                
            ]
        ]
    ]

```

编辑器的配置可以到[Neditor文档](https://www.kancloud.cn/wangfupeng/wangeditor3/335776)找到，比如配置上传图片的地址[上传图片](https://www.kancloud.cn/wangfupeng/wangeditor3/335782)

```php
    'config' => [
        'uploadImgServer' => '/upload'
    ]
```

## 使用

在form表单中使用它：
```php
$form->editor('content');
```

License
------------
Licensed under [The MIT License (MIT)](LICENSE).

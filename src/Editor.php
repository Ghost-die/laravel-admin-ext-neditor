<?php

namespace Encore\NEditor;

use Encore\Admin\Form\Field;

class Editor extends Field
{
    protected $view = 'laravel-admin-neditor::neditor';

    protected static $css = [
    ];

    protected static $js = [
        'vendor/laravel-admin-ext/neditor/basic.config.js',
        'vendor/laravel-admin-ext/neditor/neditor.all.min.js',
        'vendor/laravel-admin-ext/neditor/i18n/zh-cn/zh-cn.js',
    ];

    public function render()
    {
        /*$name = $this->formatName($this->column);
        $id = $this->formatName($this->id);

        $token = csrf_token();*/

        $this->script = <<<EOT
        UE.delEditor("ssi_ueditor_{$this->id}");
        var ue = UE.getEditor('ssi_ueditor_{$this->id}',{
            initialFrameHeight:360,//设置编辑器高度
        }); 
        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });

EOT;
        return parent::render();
    }
}

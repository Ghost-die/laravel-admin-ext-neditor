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
	    $config = NEditor::config('config', []);
	
	    $config = json_encode(array_merge($config, $this->options));

        $this->script = <<<EOT
        UE.delEditor("ssi_ueditor_{$this->id}");
        var ue = UE.getEditor('ssi_ueditor_{$this->id}',{$config});
        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });

EOT;
        return parent::render();
    }
}

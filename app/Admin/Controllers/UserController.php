<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用戶';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('name', __('姓名'));
        $grid->column('email', __('信箱'));
        $grid->column('email_verified_at', __('已驗證信箱'))->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->column('created_at', __('創建時間'));
        $grid->column('updated_at', __('更新時間'));
        
        // 禁用選項
        $grid->disableCreateButton();
        $grid->disableActions();
        $grid->tools(function ($tools) {
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });

        return $grid;
    }
}

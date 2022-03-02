<?php

namespace App\Admin\Controllers;

use App\Models\Reply;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ReplyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '回覆';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Reply());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('topic', __('話題'))->display(function ($topic) {
            return $topic['title'];
        });
        $grid->column('user', __('作者'))->display(function ($user) {
            return '<img src="' . $user['avatar'] . '" style="height:22px;width:22px;margin: 0 5px 0 0;"> ' . $user['name'];
        });
        $grid->column('content', __('內容'));

        // 禁用選項
        $grid->disableCreateButton();
        $grid->actions(function ($action) {
            $action->disableEdit();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Reply::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('topic_id', __('話題ID'));
        $show->field('user_id', __('用戶ID'));
        $show->field('content', __('內容'));
        $show->field('created_at', __('創建時間'));
        $show->field('updated_at', __('更新時間'));

        return $show;
    }
}

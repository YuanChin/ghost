<?php

namespace App\Admin\Controllers;

use App\Models\Topic;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TopicController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '話題';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Topic());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('title', __('標題'));
        $grid->column('user', __('用戶'))->display(function ($user) {
            return '<img src="' . $user['avatar'] . '" style="height:22px;width:22px;margin: 0 5px 0 0;"> ' . $user['name'];
        });
        $grid->column('category.name', __('分類'));

        // 禁用選項
        $grid->disableCreateButton();
        $grid->actions(function ($actions) {
            $actions->disableEdit();
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
        $show = new Show(Topic::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('標題'));
        $show->field('body', __('內容'));
        $show->field('user.name', __('用戶'));
        $show->field('category.name', __('分類'));
        $show->field('reply_count', __('回覆數量'));
        $show->field('view_count', __('觀看次數'));
        $show->field('last_reply_user_id', __('Last reply user id'));
        $show->field('order', __('Order'));
        $show->field('excerpt', __('Excerpt'));
        $show->field('slug', __('Slug'));
        $show->field('created_at', __('創建時間'));
        $show->field('updated_at', __('更新時間'));

        $show->panel()
            ->tools(function ($actions) {
                $actions->disableEdit();
            });

        return $show;
    }
}

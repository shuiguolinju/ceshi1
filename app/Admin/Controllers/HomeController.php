<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('主面板');
            $content->description('内容...');


            // 添加面包屑导航 since v1.5.7
            $content->breadcrumb(
                ['text' => '首页', 'url' => '/'],
                ['text' => '用户管理', 'url' => '/users'],
                ['text' => '编辑用户']

            );

            // 填充页面body部分，这里可以填入任何可被渲染的对象
//            $content->body('hello world');



            $content->row(Dashboard::title());

            $content->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
        });
    }
}

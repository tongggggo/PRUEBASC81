<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Ventas;

class VentasController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Ventas';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Ventas());

        $grid->column('id', __('Id'));
        $grid->column('Nombre', __('Nombre'));
        $grid->column('Cliente', __('Cliente'));
        $grid->column('Descripcion', __('Descripcion'));
        $grid->column('Precio', __('Precio'));
        $grid->column('Cantidad', __('Cantidad'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Ventas::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('Nombre', __('Nombre'));
        $show->field('Cliente', __('Cliente'));
        $show->field('Descripcion', __('Descripcion'));
        $show->field('Precio', __('Precio'));
        $show->field('Cantidad', __('Cantidad'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Ventas());

        $form->text('Nombre', __('Nombre'));
        $form->text('Cliente', __('Cliente'));
        $form->text('Descripcion', __('Descripcion'));
        $form->decimal('Precio', __('Precio'));
        $form->number('Cantidad', __('Cantidad'));

        return $form;
    }
}

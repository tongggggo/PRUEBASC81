<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\facturaDetalle;

class facturaDetalleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'facturaDetalle';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new facturaDetalle());

        $grid->column('id', __('Id'));
        $grid->column('idVenta', __('IdVenta'));
        $grid->column('Descripcion', __('Descripcion'));
        $grid->column('Precio', __('Precio'));
        $grid->column('Cantidad', __('Cantidad'));
        $grid->column('Total', __('Total'));
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
        $show = new Show(facturaDetalle::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('idVenta', __('IdVenta'));
        $show->field('Descripcion', __('Descripcion'));
        $show->field('Precio', __('Precio'));
        $show->field('Cantidad', __('Cantidad'));
        $show->field('Total', __('Total'));
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
        $form = new Form(new facturaDetalle());

        $form->number('idVenta', __('IdVenta'));
        $form->text('Descripcion', __('Descripcion'));
        $form->decimal('Precio', __('Precio'));
        $form->number('Cantidad', __('Cantidad'));
        $form->decimal('Total', __('Total'));

        return $form;
    }
}

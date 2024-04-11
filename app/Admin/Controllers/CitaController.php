<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Cita;

class CitaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Cita';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Cita());

        $grid->column('id', __('Id'));
        $grid->column('Fecha de cita', __('Fecha de cita'));
        $grid->column('Razón', __('Razón'));
        $grid->column('Veterinario', __('Veterinario'));
        $grid->column('Mascota', __('Mascota'));
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
        $show = new Show(Cita::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('Fecha de cita', __('Fecha de cita'));
        $show->field('Razón', __('Razón'));
        $show->field('Veterinario', __('Veterinario'));
        $show->field('Mascota', __('Mascota'));
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
        $form = new Form(new Cita());

        $form->date('Fecha de cita', __('Fecha de cita'))->default(date('Y-m-d'));
        $form->text('Razón', __('Razón'));
        $form->number('Veterinario', __('Veterinario'));
        $form->number('Mascota', __('Mascota'));

        return $form;
    }
}

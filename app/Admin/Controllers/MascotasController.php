<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Mascotas;

class MascotasController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Mascotas';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Mascotas());

        $grid->column('id', __('Id'));
        $grid->column('Nombre', __('Nombre'));
        $grid->column('Propietario', __('Propietario'));
        $grid->column('Especie', __('Especie'));
        $grid->column('Edad', __('Edad'));
        $grid->column('Descripción de la enfermedad', __('Descripción de la enfermedad'));
       //$grid->column('Foto', __('Foto'));
        $grid->column('Foto')->image();
        $grid->column('Veterinario', __('Veterinario'));
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
        $show = new Show(Mascotas::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('Nombre', __('Nombre'));
        $show->field('Propietario', __('Propietario'));
        $show->field('Especie', __('Especie'));
        $show->field('Edad', __('Edad'));
        $show->field('Descripción de la enfermedad', __('Descripción de la enfermedad'));
        $show->field('Foto', __('Foto'));
        $show->field('Veterinario', __('Veterinario'));
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
        $form = new Form(new Mascotas());

        $form->text('Nombre', __('Nombre'));
        $form->number('Propietario', __('Propietario'));
        $form->text('Especie', __('Especie'));
        $form->number('Edad', __('Edad'));
        $form->text('Descripción de la enfermedad', __('Descripción de la enfermedad'));
        $form->image('Foto', __('Foto'));
        $form->number('Veterinario', __('Veterinario'));

        return $form;
    }
}

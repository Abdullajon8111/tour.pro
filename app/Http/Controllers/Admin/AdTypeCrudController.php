<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdTypeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AdTypeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AdTypeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\AdType::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/ad-type');
        CRUD::setEntityNameStrings('', 'ad types');
    }

    protected function setupListOperation()
    {
        CRUD::column('name');
        CRUD::column('label');
        CRUD::column('amount');
        CRUD::column('lifetime');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(AdTypeRequest::class);

        CRUD::field('name');
        CRUD::field('label');
        CRUD::field('amount');
        CRUD::field('lifetime');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}

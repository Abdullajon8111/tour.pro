<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TourGroupTypeRequest;
use App\Models\TourGroupType;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TourGroupTypeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TourGroupTypeCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    public function setup()
    {
        CRUD::setModel(TourGroupType::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/tour-group-type');
        CRUD::setEntityNameStrings('tour group type', 'tour group types');
    }
    protected function setupListOperation()
    {
        CRUD::column('name')->type('text');
    }
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(TourGroupTypeRequest::class);

        CRUD::field('name')->type('text');
    }
}

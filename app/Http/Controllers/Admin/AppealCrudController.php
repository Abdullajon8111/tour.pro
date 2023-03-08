<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AppealRequest;
use App\Models\Appeal;
use App\Models\Role;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class AppealCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class AppealCrudController extends CrudController
{
    use ListOperation;
    use ShowOperation;


    public function setup()
    {
        CRUD::setModel(Appeal::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/appeal');
        CRUD::setEntityNameStrings('appeal', 'appeals');
    }

    protected function setupListOperation()
    {
        if (auth()->user()->hasRole(Role::AGENT)) {
            $this->crud->query = Appeal::with('tour')->latest('id')
                ->whereHas('tour', function (Builder $query) {
                    $query->where('user_id', auth()->id());
                });
        }

        CRUD::column('row_number')->label('#')->type('row_number');
        CRUD::column('tour_id');
        CRUD::column('phone');
        CRUD::column('name');
        CRUD::column('status');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(AppealRequest::class);

        CRUD::field('status');
    }
}

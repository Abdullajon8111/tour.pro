<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Role;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class CommentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CommentCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    public function setup()
    {
        CRUD::setModel(Comment::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/comment');
        CRUD::setEntityNameStrings('', 'comments');
    }

    protected function setupListOperation()
    {
        if (auth()->user()->hasRole(Role::AGENT)) {
            $this->crud->query = Comment::latest()->whereHas('tour', function (Builder $query) {
                $query->where('user_id', '=', auth()->id());
            });
        }

        CRUD::column('tour_id');
        CRUD::column('user_id');
        CRUD::column('context');
        CRUD::column('rating');
        CRUD::column('created_at');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(CommentRequest::class);

        CRUD::field('tour_id');
        CRUD::field('user_id');
        CRUD::field('context');
        CRUD::field('rating');
    }
}

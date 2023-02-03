<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TourRequest;
use App\Models\Role;
use App\Models\Tour;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TourCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TourCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {store as traitStore;}
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    public function setup()
    {
        CRUD::setModel(\App\Models\Tour::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/tour');
        CRUD::setEntityNameStrings('', __('Туры'));
    }


    protected function setupListOperation()
    {
        CRUD::column('name');
        CRUD::column('banner_image');
        CRUD::column('duration');
        CRUD::column('age_limit');
        CRUD::column('country_code');
        CRUD::column('time_type');
        CRUD::column('start_time');
        CRUD::column('end_time');
        CRUD::column('program');
        CRUD::column('hotels');
        CRUD::column('price_description');
        CRUD::column('price_one');
        CRUD::column('price_two');
        CRUD::column('price_family');
        CRUD::column('images');
        CRUD::column('region_id');
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(TourRequest::class);

        CRUD::field('name')->type('text')->label(__('Имя'))->tab(__('Описание'));
        CRUD::field('title')->type('text')->label(__('Заголовок'))->tab(__('Описание'));
        CRUD::field('sub_title')->type('text')->label(__('Подзаголовок'))->tab(__('Описание'));
        CRUD::field('description')->type('ckeditor')->label(__('Описание'))->tab(__('Описание'));
        CRUD::field('banner_image')->type('upload')->upload(true)->disk('uploads')->label(__('Изображение баннера'))->tab(__('Описание'));
        CRUD::field('duration')->type('text')->label(__('Продолжительность'))->tab(__('Описание'));
        CRUD::field('age_limit')->type('text')->label(__('Возрастное ограничение'))->tab(__('Описание'));

        CRUD::addField([
            'name' => 'country_code',
            'type' => 'select2_from_array',
            'options' => \Countries::getList('ru'),
            'allows_null' => false,
            'label' => __('Страна'),
            'tab' => __('Описание')
        ]);

        CRUD::addField([
            'name' => 'time_type',
            'type' => 'select_from_array',
            'options' => Tour::time_types(),
            'label' => __('Тип времени'),
            'tab' => __('Описание')
        ]);

        CRUD::field('start_time')->label(__('Время начала'))->tab(__('Описание'));
        CRUD::field('end_time')->label(__('Время окончания'))->tab(__('Описание'));

        CRUD::addField([
            'name'  => 'program',
            'label' => __('Программа'),
            'type'  => 'repeatable',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => __('Заголовок'),
                    'type' => 'text'
                ],
                [
                    'name' => 'description',
                    'type' => 'ckeditor',
                    'label' => __('Описание')
                ]
            ],
            'new_item_label'  => __('backpack::crud.add'),
            'tab' => __('Программа'),
        ]);

        CRUD::field('about')->type('ckeditor')->label(__('О курорте'))->tab(__('О курорте'));
        CRUD::field('hotels')->type('ckeditor')->label(__('Отели'))->tab(__('Отели'));

        // Цена
        CRUD::field('price_description')->type('ckeditor')->label(__('Описание цены'))->tab(__('Цена'));
        CRUD::field('price_one')->type('number')->label(__('Цена на человека'))->tab(__('Цена'));
        CRUD::field('price_two')->type('number')->label(__('Цена указана за двоих'))->tab(__('Цена'));
        CRUD::field('price_family')->type('number')->label(__('Цена семейного платежа'))->tab(__('Цена'));

        CRUD::field('visa')->type('ckeditor')->label('Виза')->label(__('Виза'))->tab(__('Виза'));

        CRUD::field('images')->type('upload_multiple')->disk('uploads')->label(__('Галерея'))->tab(__('Галерея'));

        Tour::creating(function (Tour $tour) {
            $tour->user_id = auth()->id();
        });

        if (auth()->user()->hasRole(Role::ADMIN)) {
            CRUD::field('region_id');
        }

        if (auth()->user()->hasRole(Role::AGENT)) {
            Tour::created(function (Tour $tour) {
                $agent = auth()->user()->tourAgent;
                $tour->region_id = $agent->region_id ?? null;
                $tour->save();
            });
        }
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}

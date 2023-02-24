<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TourRequest;
use App\Models\Role;
use App\Models\Tag;
use App\Models\Tour;
use App\Models\User;
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
    use \Backpack\CRUD\app\Http\Controllers\Operations\FetchOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Tour::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/tour');
        CRUD::setEntityNameStrings('', __('Туры'));

        CRUD::setShowView('tour.show');
    }


    protected function setupListOperation()
    {
        if (auth()->user()->hasRole(Role::AGENT)) {
            CRUD::addClause('where', 'user_id', '=', auth()->id());
        }

        CRUD::column('name')->type('text')->label(__('Имя'))->limit(150);
        CRUD::column('banner_image')->type('image')->label(__('изображение баннера'))->disk('uploads')->height('150px');
        CRUD::column('status')->type('view')->label(__('статус'))->view('tour.column.status');

        if (auth()->user()->hasRole(Role::ADMIN)) {
            CRUD::column('user_id');
            CRUD::column('region_id');

            CRUD::addFilter([
                'name' => 'user',
                'type' => 'select2',
                'label' => __('User')
            ],
                User::whereRelation('roles', 'name', '=', Role::AGENT)->pluck('name', 'id')->toArray(),
                function ($value) {
                    $this->crud->addClause('where', 'user_id', '=', $value);
                }
            );

//            CRUD::
        }

        CRUD::addFilter([
            'name' => 'status',
            'label' => __('статус'),
            'type' => 'dropdown'
        ], Tour::statuses(), function ($value) {
            $this->crud->addClause('where', 'status', $value);
        });
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(TourRequest::class);

        CRUD::field('name')->type('text')->label(__('Имя'))->tab(__('Описание'))->attributes(['placeholder' => __('Шри Ланка – Прямой перелет!')]);
        CRUD::field('title')->type('text')->label(__('Заголовок'))->tab(__('Описание'))->attributes(['placeholder' => __('Экзотический тур на Шри Ланку, прямой перелет')]);
        CRUD::field('sub_title')->type('text')->label(__('Подзаголовок'))->tab(__('Описание'))->attributes(['placeholder' => __('Прямой перелет на Шри — Ланку 2023 | Отдых в Индии | Курорты Шри — Ланки')]);
        CRUD::field('description')->type('ckeditor')->label(__('Описание'))->tab(__('Описание'))->attributes(['placeholder' => __('В стоимость включено: Авиаперелет Ташкент – Шри Ланка – ТашкентГрупповой трансфер аэропорт – отель – аэропортПроживание в отелях выбранной категорииПитание – завтракиСтраховкаДополнительно оплачивается:Услуги фирмы – 200 000 сумОформление визы заранее 45$ c человека ( по Гос курсу на день оплаты)')]);
        CRUD::field('banner_image')->type('upload')->upload(true)->disk('uploads')->label(__('Изображение баннера'))->tab(__('Описание'));
        CRUD::field('duration')->type('text')->label(__('Продолжительность'))->tab(__('Описание'))->attributes(['placeholder' => __('От 7 до 14 дней')]);
        CRUD::field('age_limit')->type('text')->label(__('Возрастное ограничение'))->tab(__('Описание'))->attributes(['placeholder' => __('0+')]);

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
                    'type' => 'text',
                    'attributes' => [
                        'placeholder' => __('День 1')
                    ]
                ],
                [
                    'name' => 'description',
                    'type' => 'ckeditor',
                    'label' => __('Описание'),
                    'attributes' => [
                        'placeholder' => __('Прилёт в Хамбантона, трансфер в отель')
                    ]

                ]
            ],
            'new_item_label'  => __('backpack::crud.add'),
            'tab' => __('Программа'),
        ]);

        CRUD::field('about')->type('ckeditor')->label(__('О курорте'))->tab(__('О курорте'))->attributes(['placeholder' => __('Стиль отдыха на Шри-Ланке можно вкратце определить так: подальше от шума и суеты, поближе к морю и природе. Вряд ли в мире найдется более «неторопливая» страна, чем Шри-Ланка: здесь никто никуда не спешит, все наслаждаются жизнью — в том числе и обслуживающий персонал в отелях (к топовым заведениям, правда, не относится — там все бегают в мыле, чтобы ублажить постояльцев). Большинство достопримечательностей на Шри-Ланке природные, точно так же, как и большинство развлечений. Шумные дискотеки и дым коромыслом до утра здесь не в фаворе, а вот пикники на природе, рыбалка или барбекю на пляже — сколько угодно. Ну и дайвинг, само собой. Чем Шри-Ланка не может порадовать, так это близостью к нашей необъятной: перелет сюда длительный.')]);
        CRUD::field('hotels')->type('ckeditor')->label(__('Отели'))->tab(__('Отели'))->attributes(['placeholder' => __('CORAL SANDS HOTEL LUB KOGGALA VILLAGE 4* HERITANCE AHUNGALLA 5* Так же имеются другие отели под индивидуальный расчет')]);

        // Цена
        CRUD::field('price_description')->type('ckeditor')->label(__('Описание цены'))->tab(__('Цена'))->attributes(['placeholder' => __('Стоимость тура на 7 дней при проживании в отелях 3*  : В двухместном номере с человека – от 15,162,000 сум Стоимость тура при проживании в отеле 4*: В двухместном номере с человека – от 16,131,000 сум Стоимость тура при проживании в отеле 5*: В двухместном номере с  человека –от 16,880,000 сум')]);
        CRUD::field('price_one')->type('number')->label(__('Цена на человека'))->tab(__('Цена'))->attributes(['placeholder' => __('15,162,000 сум')]);
        CRUD::field('price_two')->type('number')->label(__('Цена указана за двоих'))->tab(__('Цена'))->attributes(['placeholder' => __('16,131,000 сум')]);
        CRUD::field('price_family')->type('number')->label(__('Цена семейного платежа'))->tab(__('Цена'))->attributes(['placeholder' => __('16,880,000 сум')]);

        CRUD::field('visa')->type('ckeditor')->label('Виза')->label(__('Виза'))->tab(__('Виза'))->attributes(['placeholder' => __('Отсканированная био страница паспорта с фотографией и деталями.')]);

        CRUD::field('images')->type('upload_multiple')->disk('uploads')->label(__('Галерея'))->tab(__('Галерея'));

        $this->crud->addField([
            'label' => 'Tags',
            'type' => 'relationship',
            'name' => 'tags',
            'entity' => 'tags',
            'attribute' => 'name',
            'pivot' => true,
            'inline_create' => ['entity' => 'tag'],
        ]);

        if (auth()->user()->hasRole(Role::ADMIN)) {
            CRUD::field('region_id');
        }

        if (auth()->user()->hasRole(Role::AGENT)) {
            Tour::created(function (Tour $tour) {
                $agent = auth()->user()->tourAgent;
                $tour->region_id = $agent->region_id ?? null;
                $tour->status = Tour::STATUS_UNDER_REVIEW;
                $tour->save();
            });
        }
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function fetchTags()
    {
        return $this->fetch(Tag::class);
    }

    public function status(Tour $tour, int $status)
    {
        if (in_array($status, array_keys(Tour::statuses()))) {
            $tour->status = $status;
            $tour->save();
        }

        return back();
    }
}

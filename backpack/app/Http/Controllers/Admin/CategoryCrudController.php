<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    

    public function setup()
    {
        $this->crud->setModel('App\Models\Category');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/category');
        $this->crud->setEntityNameStrings('category', 'categories');
        // $this->crud->enableBulkActions();
        // $this->crud->denyAccess(['list', 'create', 'update']);
    }

    protected function setupListOperation()
    {
        // Property::where
        $this->crud->addClause('where', 'id', 11);

        $this->crud->orderBy('id', 'asc');

        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();

        $this->crud->addColumn([
            'name' => 'id',
            'label' => 'ID',
            'type' => 'flexi_text'
        ]);
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'MyColumn'
        ]);

        $this->crud->addColumn([
            'name' => "created_at", // The db column name
            'label' => "created_at", // Table column heading
            'type' => "date",
             'format' => 'Y',
         ]);
         
        // if (false) $this->crud->removeColumn('id');

         $this->crud->addFilter([
            'name'  => 'name',
            'type'  => 'select2',
            'label' => 'Status'
          ], function () {
            return \App\Models\Category::pluck('name', 'id')->toArray();
          }, function ($value) { // if the filter is active
            $this->crud->addClause('where', 'id', $value);
          });


        //   $this->crud->addButton($stack, $name, $type, $content, $position);

        //   // add a button whose HTML is returned by a method in the CRUD model
          $this->crud->addButtonFromModelFunction('bottom', 'testButton', 'testButton', 'end');
          
        //   // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        //   $this->crud->addButtonFromView($stack, $name, $view, $position);
          
        //   // remove a button
        //   $this->crud->removeButton($name);

    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CategoryRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        // $this->crud->setFromDb();
        $this->crud->addField([
            'name' => 'name',
            'label' => 'N',
            'type' => 'number',
            // 'wrapperAttributes' => [
            //     'class' => 'col-6'
            // ],
            // 'attributes' => [
            //     'step' => 'any'
            // ]
        ]);
        $this->crud->addField([   // Upload
            'name' => 'created_by',
            'label' => 'Photos',
            'type' => 'upload_multiple',
            'upload' => true,
            'disk' => 'uploads', // if you store files in the /public folder, please ommit this; if you store them in /storage or S3, please specify it;
            // optional:
            // 'temporary' => 10 // if using a service, such as S3, that requires you to make temporary URL's this will make a URL that is valid for the number of minutes specified
        ]);
        $this->crud->addField([
            'name' => 'updated_by',
            'label' => 'SetNUame',
            ''
        ]);
        
    }

    protected function setupUpdateOperation()
    {
        // $this->setupCreateOperation();
        $this->crud->setValidation(CategoryRequest::class);
         $this->crud->addField([
            'name' => 'created_by',
            'label' => 'CreatedBy',
        ]);
    }

    public function destroy($id)
    {
        $this->crud->hasAccessOrFail('delete');
        // get entry ID from Request (makes sure its the last ID for nested resources)
        $id = $this->crud->getCurrentEntryId() ?? $id;

        return $this->crud->delete($id);
    }
}

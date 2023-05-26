<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\Doctor;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};

final class DoctorTable extends PowerGridComponent
{
    use ActionButton;
    use WithExport;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    protected function getListeners(): array
    {
        return array_merge(
            parent::getListeners(),
            [
                'refreshLivewireDatatable'   => '$refresh',
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\Doctor>
     */
    public function datasource(): Builder
    {
        return Doctor::query()->with('locality');
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('name')

            /** Example of custom column using a closure **/
            ->addColumn('name_lower', fn (Doctor $model) => strtolower(e($model->name)))

            ->addColumn('locality.name')
            ->addColumn('gender')
            ->addColumn('contact_no')
            ->addColumn('qualification')
            ->addColumn('registration_no')
            ->addColumn('department')
            ->addColumn('registration_fee')
            ->addColumn('consultation_fee')
            ->addColumn('review_link')
            ->addColumn('about', function (Doctor $model) {
                return Str::words(e($model->about), 8);
            })
            ->addColumn('career_start_date')
            ->addColumn('created_at_formatted', fn (Doctor $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('action', function (Doctor $model) {
                return view('pages.backend.doctors.action', ['id' => $model->id]);
            });
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Locality id', 'locality.name'),
            Column::make('Gender', 'gender')
                ->sortable()
                ->searchable(),

            Column::make('Contact no', 'contact_no')
                ->sortable()
                ->searchable(),

            Column::make('Qualification', 'qualification')
                ->sortable()
                ->searchable(),

            Column::make('Registration no', 'registration_no')
                ->sortable()
                ->searchable(),

            Column::make('Department', 'department')
                ->sortable()
                ->searchable(),

            Column::make('Registration fee', 'registration_fee')
                ->sortable()
                ->searchable(),

            Column::make('Consultation fee', 'consultation_fee')
                ->sortable()
                ->searchable(),

            Column::make('Review link', 'review_link')
                ->sortable()
                ->searchable(),

            Column::make('About', 'about')
                ->sortable()
                ->searchable(),

            Column::make('Career start date', 'career_start_date')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Action', 'action'),

        ];
    }

    /**
     * PowerGrid Filters.
     *
     * @return array<int, Filter>
     */
    public function filters(): array
    {
        return [
            Filter::inputText('name')->operators(['contains']),
            Filter::inputText('gender')->operators(['contains']),
            Filter::inputText('contact_no')->operators(['contains']),
            Filter::inputText('qualification')->operators(['contains']),
            Filter::inputText('registration_no')->operators(['contains']),
            Filter::inputText('department')->operators(['contains']),
            Filter::inputText('registration_fee')->operators(['contains']),
            Filter::inputText('consultation_fee')->operators(['contains']),
            Filter::inputText('review_link')->operators(['contains']),
            Filter::inputText('career_start_date')->operators(['contains']),
            Filter::datetimepicker('created_at'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Doctor Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('doctor.edit', function(\App\Models\Doctor $model) {
                    return $model->id;
               }),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('doctor.destroy', function(\App\Models\Doctor $model) {
                    return $model->id;
               })
               ->method('delete')
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Doctor Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($doctor) => $doctor->id === 1)
                ->hide(),
        ];
    }
    */
}

<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;


use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<Role>
 */
class RoleResource extends ModelResource
{
    protected string $model = Role::class;

    protected string $title = 'Roles';


    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')
                ->customAttributes([
                    'placeholder' => 'Enter role name',
                ]),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make()->sortable(),
                Text::make('Name')
                    ->required()
                    ->customAttributes([
                        'placeholder' => 'Enter role name',
                    ]),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')
                ->required()
                ->customAttributes([
                    'placeholder' => 'Enter role name',
                ]),
        ];
    }

    /**
     * @param Role $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}

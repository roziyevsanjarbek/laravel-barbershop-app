<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\RoleUser;

use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;

/**
 * @extends ModelResource<RoleUser>
 */
class RoleUserResource extends ModelResource
{
    protected string $model = RoleUser::class;

    protected string $title = 'RoleUsers';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('User', 'user')
                ->sortable()
                ->nullable()
                ->searchable(),
            BelongsTo::make('Role', 'role')
                ->nullable()
                ->searchable(),

        ];

    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('User', 'user')
                ->sortable()
                ->nullable()
                ->searchable(),
            BelongsTo::make('Role', 'role')
                ->nullable()
                ->searchable(),

        ];

    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('User', 'user')
                ->sortable()
                ->nullable()
                ->searchable(),
            BelongsTo::make('Role', 'role')
                ->nullable()
                ->searchable(),

        ];

    }

    /**
     * @param RoleUser $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}

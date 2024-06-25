<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\MoonShine\Resources\CustomPage;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use MoonShine\Fields\Select;

/**
 * @extends ModelResource<Producto>
 */
class ProductoResource extends ModelResource
{
    protected string $model = Producto::class;

    protected string $title = 'producto';


    protected bool $createInModal = true;

    protected bool $editInModal = true;

    protected bool $detailInModal = false;


    public function redirectAfterSave(): string
    {
        $refrence = request()->header('referer');
        return $refrence ?: '';
    }

    public function redirectAfterDelete(): string
    {
        $refrence = request()->header('referer');
        return $refrence ? : '';
    }

    
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('nombre'),
                Number::make('precio'),
                Select::make('condicion')->options([
                    'N' => 'Nuevo',
                    'S' => 'Semi-nuevo',
                    'U' => 'Usado',
                    'E' => 'Economico',
                ]),
                Text::make('descripcion'),
            ]),
        ];
    }

    /**
     * @param Producto $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}

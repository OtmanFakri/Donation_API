<?php

namespace Src\Item\Repositories;

use App\Models\Item;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use Src\Item\Factories\ItemPostFactory;
use Src\Item\Images\Factories\PostImageFactory;
use Src\Item\Images\Repositories\ImageRepositories;
use Src\Item\Object\Factories\ObjectPostFactory;
use Src\Item\Object\Repositories\ObjectRepositories;
use Src\Item\Requests\PostObjectRequests;
use Src\Item\ValueObjects\PostItemValueObject;

class ItemRepositories implements ItemRepositoriesInterface
{

    public static function index(): QueryBuilder
    {
        $query = QueryBuilder::for(
            Item::class
        )
            ->has('Object')
            ->with([
                'Object',
                'Object.Category',
                'ItemImages'
            ]);

        return $query;
    }

    public static function ObjectMe( $user): QueryBuilder
    {
        $query = QueryBuilder::for(
            $user->items()
        )
            ->with(['Object','Object.Category','ItemImages']);

        return $query;
        // TODO: Implement ObjectMe() method.
    }

    public static function Store(PostObjectRequests $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $postItem = self::StroeItem(ItemPostFactory::CreatItem($request->validated()));
                $postObject = ObjectPostFactory::CreatObject($request->validated());
                ObjectRepositories::Store($postObject,$postItem);

               // $refImage=ImageRepositories::save($request->file('image_path'));
                //dd([$imageFactory]);
                //$postItem->itemImages()->createMany($refImage);

            });
        } catch (\Exception $e) {
            throw new Exception('Error in saving data: ' . $e->getMessage());
        }

    }

    public static function StroeItem(PostItemValueObject $request): Item
    {
        try {
            return DB::transaction(function () use ($request) {
                //$postItem = self::StroeItem(ItemPostFactory::CreatItem($request));
                //$postObject = ObjectPostFactory::CreatObject($request->validated());
                //ObjectRepositories::Store($postObject,$postItem);

                $postItem = ItemPostFactory::CreatItem($request->toarray());
                $response=Item::create($postItem->toarray());

                $refImage=ImageRepositories::save($request->image_path);
                //dd([$imageFactory]);
                $response->itemImages()->createMany($refImage);

                return $response;

            });
        } catch (\Exception $e) {
            throw new Exception('Error in saving data: ' . $e->getMessage());
        }
    }

    public static function ObjectShow(Item $item)
    {

        $query=QueryBuilder::for(
            Item::where('id', $item->id)
        )
            ->with([
                'user',
                'Object',
                'Object.Category',
                'ItemImages'])
            ->firstOrFail();

        return $query;
    }

    public static function Objectdeleted($item): bool
    {
        try {
            $item->delete();
            return  true;
        }
        catch (\Throwable $th) {
            return false;
        }
    }


    public static function Testindex($relatedModels = [])
    {
        $query =
            QueryBuilder::for(Item::class)
                ->paginate(10);

        foreach ($relatedModels as $model) {
            $query->with($model);
        }
        return $query;
    }
}

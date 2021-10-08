<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Collection;
use App\Models\House;

class CollectionController extends Controller
{
    public function getCollections(Request $request){
        $datas = [];
        
        $collections = Collection::where('user_id',$request->user->id)->get();
        foreach($collections as $collection){
            $house = House::find($collection->house_id);

            $data = [];
            foreach([
                "title",
                "thumbnail_path",
                "price",
                "total_area",
                "public_area",
                "bedroom_count",
                "living_room_count",
                "dining_room_count",
                "kitchen_count",
                "license_date",
                "floor",
                "bathroom_count",
            ] as $i){
                $data[$i] = $house[$i];
            }
            $datas[] = $data;
        }

        return $this->ok($data);
    }

    public function postCollection(Request $request){
        if(!$request->has([
            "house_id",
        ])) return $this->error('MSG_MISSING_FIELD', 400);

        $house = House::find($request->house_id);
        if(!$house) return $this->error('MSG_HOUSE_NOT_EXISTS', 404);
        
        if(Collection::where([
            'user_id' => $request->user->id,
            'house_id' => $house->id,
        ])->first()) return $this->error('MSG_HOUSE_COLLECTED', 409);
        
        $collection = new Collection;
        foreach([
            'user_id' => $request->user->id,
            'house_id' => $house->id,
        ] as $k => $v){
            $collection[$k] = $v;
        }
        
        $collection->save();

        return $this->ok($collection->id);
    }

    public function deleteCollection(Request $request, $collection_id){
        $collection = Collection::find($collection_id);
        if(!$collection) return $this->error('MSG_COLLECTION_NOT_EXISTS', 404);

        $house = House::find($collection->house_id);
        if(!$house) return $this->error('MSG_HOUSE_NOT_EXISTS', 404);
        
        $collection->delete();

        return $this->ok();
    }
}

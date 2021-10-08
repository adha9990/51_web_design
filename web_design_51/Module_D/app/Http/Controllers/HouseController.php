<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\House;
use App\Models\HousesExtra;

class HouseController extends Controller
{
    public function getHouses(Request $request){
        $datas = [];
        
        $houses = House::All();
        foreach($houses as $house){
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

    public function getHouse(Request $request, $house_id){
        $data = [];

        $house = House::find($house_id);
        if(!$house) return $this->error('MSG_HOUSE_NOT_EXISTS', 404);

        $housesExtra = HousesExtra::find($house_id);
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
        foreach([
            "description",
            "full_address",
        ] as $i){
            $data[$i] = $housesExtra[$i];
        }

        return $this->ok($data);
    }

    public function postHouse(Request $request){
        if(!$request->has([
            "area_id",
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
            "description",
            "full_address",
        ])) return $this->error('MSG_MISSING_FIELD', 400);

        $house = new House;
        $housesExtra = new HousesExtra;

        $house->user_id = $request->user->id;
        $house->area_id = $request->area_id;
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
            $house[$i] = $request->input($i);
        }
        $house->save();

        $housesExtra->house_id = $house->id;
        foreach([
            "description",
            "full_address",
        ] as $i){
            $housesExtra[$i] = $request->input($i);
        }
        $housesExtra->save();
        
        return $this->ok($house->id);
    }

    public function putHouse(Request $request, $house_id){
        if(!$request->has([
            "area_id",
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
            "description",
            "full_address",
        ])) return $this->error('MSG_MISSING_FIELD', 400);

        $house = House::find($house_id);
        if(!$house) return $this->error('MSG_HOUSE_NOT_EXISTS', 404);
        $housesExtra = HousesExtra::find($house_id);

        $house->user_id = $request->user->id;
        $house->area_id = $request->area_id;
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
            $house[$i] = $request->input($i);
        }
        $house->save();

        $housesExtra->house_id = $house->id;
        foreach([
            "description",
            "full_address",
        ] as $i){
            $housesExtra[$i] = $request->input($i);
        }
        $housesExtra->save();
        
        return $this->ok();
    }

    public function deleteHouse(Request $request, $house_id){
        $house = House::find($house_id);
        if(!$house) return $this->error('MSG_HOUSE_NOT_EXISTS', 404);
        $housesExtra = HousesExtra::find($house_id);

        $housesExtra->delete();
        $house->delete();

        return $this->ok();
    }
}

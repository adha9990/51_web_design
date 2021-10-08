<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\AdRequest;
use App\Models\Ad;

use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function postAds(Request $request){
        if(!$request->has([
            "house_id",
        ])) return $this->error('MSG_MISSING_FIELD', 400);

        $house = House::find($request->house_id);
        if(!$house) return $this->error("MSG_HOUSE_NOT_EXISTS", 404);

        if(!AdRequest::where([
            "house_id" => $house->id,
            "review_status" => "REVIEWING",
        ])->first()) return $this->error("MSG_HOUSE_APPLIED", 409);

        if(!AdRequest::where([
            "house_id" => $house->id,
            "review_status" => "APPROVE",
        ])->first()) return $this->error("MSG_HOUSE_APPLIED", 409);
    
        $adRequest = new AdRequest;
        $adRequest->house_id = $house_id;
        $adRequest->save();

        $ad = new AdRequest;
        $ad->ad_request_id = $adRequest->id;
        $ad->house_id = $house->id;
        $ad->save();

        return $this->ok($ad->id);
    }
    public function getAds(Request $request){
        $datas = [];

        $Ads = Ads::all();
        foreach($Ads as $ad){
            $adRequest = AdRequest::find($ad->ad_request->id);
            
            $data = [];
            foreach([
                "house_id",
                "reviewer_id",
                "review_status",
                "reviewed_at",
            ] as $i){
                $data[$i] = $adRequest[$i];
            }
            $datas[] = $data;
        }

        return $this->ok($datas);
    }
    public function putAds(Request $request, $ad_id){
        if(!$request->has([
            "review_status",
        ])) return $this->error('MSG_MISSING_FIELD', 400);

        $ad = ad::find($ad_id);
        if(!$ad) return $this->error('MSG_AD_NOT_EXISTS', 409);
        
        // 不理解用途
        $house = House::find($ad->house_id);
        if(!$house) return $this->error('不存在的房屋', 404);

        $adRequest = AdRequest::find($ad->ad_request_id);

        $adRequest->reviewer_id = $request->user->id;
        $adRequest->review_status = $request->review_status;
        $adRequest->reviewed_at = now();
        $adRequest->save();
        
        return $this->ok();
    }
    public function deleteAds(Request $request, $ad_id){
        $ad = Ad::find($ad_id);
        if(!$ad) return $this->error('MSG_AD_NOT_EXISTS', 409);
        
        // 不理解用途
        $house = House::find($ad->house_id);
        if(!$house) return $this->error('不存在的房屋', 404);

        $ad->delete();

        return $this->ok();
    }
}

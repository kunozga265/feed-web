<?php

namespace App\Http\Controllers;

use App\Http\Resources\FeedResource;
use App\Models\Feed;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        $feeds = Feed::all();
//        $roughages = Feed::where("type",2)->get();

        return response()->json([
            "feeds" => FeedResource::collection($feeds),
//            "roughages" => FeedResource::collection($roughages),
        ]);

    }


    public function seeder(Request $request)
    {
        $request->validate([
            "roughages" => ["required"],
            "concentrates" => ["required"],
        ]);

        dump("Adding roughages...");
        foreach ($request->roughages as $feed){
            $this->addFeed($feed,1);
        }
        dump("Adding concentrates...");
        foreach ($request->concentrates as $feed){
            $this->addFeed($feed,2);
        }
        dump("Feed Seeder Complete!");
    }

    private function addFeed($feed, $type)
    {
        Feed::create([
            "type" => $type,
            "name" => $feed["name"],
            "dm" => $feed["dm"],
            "cp" => $feed["cp"],
            "ndf" => $feed["ndf"],
            "fat" => $feed["fat"],
            "adf" => $feed["adf"],
            "phosphorus" => $feed["phosphorus"],
            "calcium" => $feed["calcium"],
            "sodium" => $feed["sodium"],
            "chlorine" => $feed["chlorine"],
            "potassium" => $feed["potassium"],
            "magnesium" => $feed["magnesium"],
            "sulphur" => $feed["sulphur"],
            "cobalt" => $feed["cobalt"],
            "copper" => $feed["copper"],
            "iodine" => $feed["iodine"],
            "iron" => $feed["iron"],
            "manganese" => $feed["manganese"],
            "selenium" => $feed["selenium"],
            "zinc" => $feed["zinc"],
            "vitamin_a" => $feed["vitamin_a"],
            "vitamin_d" => $feed["vitamin_d"],
            "vitamin_e" => $feed["vitamin_e"],
            "energy" => $feed["energy"],
            "percentage" => $feed["percentage"],
            "cost" => $feed["cost"],
            "net_energy" => $feed["net_energy"],
        ]);
    }
}

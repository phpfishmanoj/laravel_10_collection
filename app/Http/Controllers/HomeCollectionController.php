<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeCollectionController extends Controller
{
    //
    public function index()
    {
        // $itemsNew = new Collection(['Apple', 'Ball', 'Cat', 'Dog']); //collection object class
        // dd($itemsNew);

        $items = collect(['Apple', 'Ball', 'Cat', 'Dog', 'Bag']); //helper
        //dd($items); //give collection
        //dd($items->all()); //give collection as array
        //dd($items->count()); //give count
        //dd($items->toArray()); //give collection as array format

        $exceptVal = 'Ball';
        $result = $items->map(function ($item) {
            return strtoupper($item);
        });

        //   dd($result);

        //dd($result->sort());

        $items = collect([
            ['label' => 'cake', 'name' => 'Cake', 'price' => 150],
            ['label' => 'pizza', 'name' => 'Pizza', 'price' => 250],
            ['label' => 'puff', 'name' => 'Veg Puff', 'price' => 20],
            ['label' => 'samosa', 'name' => 'Samosa', 'price' => 14]
        ]);

        //dd($items->sortBy('price'));
        //dd($items->sum('price'));
        //dd($items->max('price'));

        $result = $items->where('price', '>', 200);
        //dd($result);
        //dd($result);

        $users = User::get();
        //dd($users);
        //dd($users->all());
        //dd($users->count());
        $result = $users->map(function ($usr) {
            //return strtoupper($usr->name);
            return strtoupper($usr->email);
        });
        //dd($result);
        //dd($result->all());

        $result = $users->pluck('email', 'name')->all();
        //dd($result);

        $users = User::get();
        $result = $users->where('age', '>', 50);
        //dd($result);
        //dd($result->all());
        //$result = $users->where('age', '<'. '30')

        //dd($users->max('age'));
        dd($users->min('age'));
    }
}

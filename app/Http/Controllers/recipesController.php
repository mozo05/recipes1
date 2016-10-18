<?php

namespace App\Http\Controllers;
use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Requests;

class recipesController extends Controller
{

    //Store value in $p
    //if it is between 1 and 5, store it as the new rating, if not do nothing
    public function rate($recipesId, $value)
    {
        $p = $value;
        if ($p < 6 AND $p >0) {
        $r = Recipe::find($recipesId);
        $r->rating = $p;
            $r->save();}
        }

// take value inputter ($cusineId), if it matches with recipe_cusine in sqlite
//then order the results by id in ascending order, and get them back
    public function cuisineType($cuisineId)
    {
        return Recipe::where('recipe_cuisine', $cuisineId)
            ->orderBy('id', 'asc')
            ->get();
    }

    // take whatever is inputted, store it in $all
    //populate recipe with all and return a new recipe row
    public function store(Request $request)
    {
        $all = $request->all();
        $recipe = Recipe::firstOrCreate($all);
        return $recipe;
    }

// return everything in the database
    public function index()
    {
        return Recipe::all();
    }

// return the recipe that matches with the inputted id
    public function show($recipesId)
    {
        return Recipe::find($recipesId);
    }

    // id that is inputted stored in $all
    // find recipe that correlates to inputted id
    // return this recipe
    public function update(Request $request, $recipesId)
    {
        $all = $request->all();
        $recipe = Recipe::find($recipesId);
        $recipe->update($all);
        return $recipe;
    }

    // delete the recipe that correlates to the inputted id
    public function delete($recipesId)
    {
        Recipe::destroy($recipesId);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    static public function selectCategory(){
        $lang = session()->get('localeDB');

        $query = Category::Select('id', 
                        DB::raw("(CASE WHEN category$lang IS NULL THEN category ELSE category$lang END) as category"))
                    ->OrderBy('category')
                    ->get();
        return $query;
    }
}

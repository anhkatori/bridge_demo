<?php

namespace App\Repositories;

use App\Models\Classes;
use Illuminate\Support\Carbon;

class ClassesRepository
{
    public function listbyschool($id){
        $data = Classes::select(
            'classes.id',
            'classes.name'
        )
        ->leftJoin('schools','classes.school_id',"schools.id")
        ->where('classes.school_id', $id)->get();
        return $data;
    }
    public function destroy($id){
        $classes = Classes::find($id);
        $classes->deleted_at = Carbon::now();
        return $classes->save();
    }
}

<?php

namespace App\Repositories;

use App\Models\Schools;
use Carbon\Carbon;

class SchoolsRepository
{
    public function destroy($id){
        $schoolyear = Schools::find($id);
        $schoolyear->deleted_at = Carbon::now();
        return $schoolyear->save();
    }
    public function listbyschoolyear($id){
        $data = Schools::select(
            'schools.id',
            'schools.name'
        )
        ->leftJoin('school_year','schools.school_year_id',"school_year.id")
        ->where('schools.school_year_id', $id)->get();
        return $data;
    }
    public function search($searchKey){
        $data = Schools::select(
            'schools.id',
            'schools.name',
            'school_year.name as school_year'
        )
        ->leftJoin('school_year','schools.school_year_id',"school_year.id")
        ->where('schools.name', 'like', '%' . $searchKey . '%')->get();
        return $data;
    }
}

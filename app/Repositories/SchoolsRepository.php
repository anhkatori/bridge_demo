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
            'school.id',
            'school.name'
        )
        ->leftJoin('school_year','school.school_year_id',"school_year.id")
        ->where('school.school_year_id', $id)->get();
        return $data;
    }
    public function search($searchKey){
        $data = Schools::select(
            'school.id',
            'school.name',
            'school_year.name as school_year'
        )
        ->leftJoin('school_year','school.school_year_id',"school_year.id")
        ->where('school.name', 'like', '%' . $searchKey . '%')->get();
        return $data;
    }
}

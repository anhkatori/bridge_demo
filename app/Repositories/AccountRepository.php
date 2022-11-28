<?php

namespace App\Repositories;

use App\Models\Account;
use Carbon\Carbon;

class AccountRepository
{
    public function All(){
        $data = Account::select('account.id' , 'account.full_name','account.email','account.role','classes.name as class','schools.name as school','school_year.name as school_year','account.check_first_login','account.status','account.usage_time','account.expired_at')
        ->leftJoin('classes','account.class_id',"classes.id")
        ->leftJoin('schools','account.school_id',"schools.id")
        ->leftJoin('school_year','account.school_year_id',"school_year.id");
        return $data;
    }
    public function getData($id){
        $data = $this->All()
        ->where('account.id',$id)
        ->first();
        return $data;
    }
    public function getAllUser(){
        $data = $this->All()
        ->get();
        return $data;
    }
    public function search($searchKey){
        $data = $this->All()
        ->where(function ($query) use ($searchKey) {
            return $query->where('account.full_name', 'like', '%' . $searchKey . '%')
                ->orwhere('account.email', 'like', '%' . $searchKey . '%');
        })
        ->get();
        return $data;
    }
    public function destroy($id){
        $classes = Account::find($id);
        $classes->deleted_at = Carbon::now();
        return $classes->save();
    }
}

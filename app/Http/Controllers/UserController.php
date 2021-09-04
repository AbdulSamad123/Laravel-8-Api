<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_category;

class UserController extends Controller
{
    // for Get Method

    // function list(){
    //    return tbl_category::all();
    // }

    //  function list($id){
    //     return tbl_category::find($id);
    //  }
 
    //when colum name is id run this for get data

    // function list($id=null){
    //     return $id?tbl_category::find($id):tbl_category::all();
    //  }

    //when columname is categoryID run this for get data by id

    function list($categoryID){
        return tbl_category::where('categoryID',$categoryID)->get();
   
       }


    //For Post

    function add(Request $req) {
        
        $device= new tbl_category;
        $device->categoryID=$req->categoryID;
        $device->category=$req->category;
        $device->categoryAr=$req->categoryAr;
        $device->categoryEng=$req->categoryEng;
        $result=$device->save();
        if($result)
        {
            return ["result"=>"Data has been Saved"];
        }
        else
        {
            return ["result"=>"Operation Fail"];
        }
    }

    //For Update

    function update(Request $req) {
        
        $device= tbl_category::find($req->id);
        $device->category=$req->category;
        $device->categoryAr=$req->categoryAr;
        $device->categoryEng=$req->categoryEng;
        $result=$device->save();
        if($result)
        {
            return ["result"=>"Data has been Updated"];
        }
        else
        {
            return ["result"=>"Operation Fail"];
        }

    }

    // for delete

    function delete($categoryID)
    {
        $device= tbl_category::where('categoryID',$categoryID);
        $result= $device->delete();
        if($result)
        {
          return ["result"=>"Data has been deleted"];
        }
    }

    //for search

    function search($categoryEng)
    {
        return tbl_category::where("categoryEng","like","%".$categoryEng."%")->get();
    }
 
}

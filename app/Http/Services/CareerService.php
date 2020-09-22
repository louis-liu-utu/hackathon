<?php


namespace App\Http\Services;


use App\Career;

class CareerService
{
    public function getCareers() {
        return Career::latest()->get();
    }

    public function createCareer($request) {
        try {
            $career = Career::create($request->except('_token'));
            $career->lb_content = $request->lb_content;
            $career->save();
            return $career;
        } catch (\Exception $e) {
            throw $e;
        }
     }

     public function updateCareer($career,$request) {
         try {
             $career->update($request->except('_token'));
             $career->lb_content = $request->lb_content;
             $career->save();
             return $career;
         } catch (\Exception $e) {
             throw $e;
         }
     }

    public function deleteCareer($career) {
        try {
            $career->delete();
        } catch (\Exception $e) {
            throw $e;
        }
    }

}

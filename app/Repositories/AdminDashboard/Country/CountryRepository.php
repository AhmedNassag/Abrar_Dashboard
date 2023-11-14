<?php

namespace App\Repositories\AdminDashboard\Country;

use App\Models\AdminDashboard\Country;
use App\Models\AdminDashboard\User;

class CountryRepository implements CountryInterface 
{

    public function index($request)
    {
        $countries  = Country::paginate(config('myConfig.paginate_count'));
        
        return view('AdminDashboard.country.index', compact('countries'));
    }



    public function show($id)
    {
        $country = Country::findOrFail($id);

        return view('AdminDashboard.country.show', compact('country'));
    }



    public function store($request)
    {
        try {
            $validated = $request->validated();
            $inputs = $request->all();
            //insert data
            $country = Country::create($inputs);
            if (!$country) {
                session()->flash('error');
                return redirect()->back();
            }

            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function update($request)
    {
        try {
            $validated = $request->validated();
            $country = Country::findOrFail($request->id);
            if (!$country) {
                session()->flash('error');
                return redirect()->back();
            }
            $inputs = $request->all();
            $country->update($inputs);
            if (!$country) {
                session()->flash('error');
                return redirect()->back();
            }
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy($request)
    {
        try {
            $related_table = User::where('Country_id', $request->id)->pluck('Country_id');
            if($related_table->count() == 0) { 
                $country = Country::findOrFail($request->id);
                if (!$country) {
                    session()->flash('error');
                    return redirect()->back();
                }
                $country->delete();
                session()->flash('success');
                return redirect()->back();
            } else {
                session()->flash('canNotDeleted');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function deleteSelected($request)
    {
        try {
            $delete_selected_id = explode(",", $request->delete_selected_id);
            foreach($delete_selected_id as $selected_id) {
                $related_table = User::where('Country_id', $selected_id)->pluck('Country_id');
                if($related_table->count() == 0) {
                    $countries = Country::whereIn('id', $delete_selected_id)->delete();
                    session()->flash('success');
                    return redirect()->back();
                } else {
                    session()->flash('canNotDeleted');
                    return redirect()->back();
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        
    }
}

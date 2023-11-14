<?php

namespace App\Http\Controllers\AdminDashboard\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\Country\CountryStoreRequest;
use App\Http\Requests\AdminDashboard\Country\CountryUpdateRequest;
use App\Repositories\AdminDashboard\Country\CountryInterface;
//use App\DataTables\Country\CountryDataTable;


class CountryController extends Controller
{
    protected $country;

    public function __construct(CountryInterface $country)
    {
        $this->country = $country;
    }


    // public function index(CountryDataTable $countries)
    // {
    //     return $countries->render('dashboard.country.index', ['title' => trans('main.countries')]);
    // }

    public function index(Request $request)
    {
        return $this->country->index($request);
    }



    public function show($id)
    {
        return $this->country->show($id);
    }



    public function store(CountryStoreRequest $request)
    {
        return $this->country->store($request);
    }



    public function update(CountryUpdateRequest $request)
    {
        return $this->country->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->country->destroy($request);
    }



    public function deleteSelected(Request $request)
    {
        return $this->country->deleteSelected($request);
    }
}

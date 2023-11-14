<?php

namespace App\Http\Controllers\AdminDashboard\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\User\UserStoreRequest;
use App\Http\Requests\AdminDashboard\User\UserUpdateRequest;
use App\Repositories\AdminDashboard\User\UserInterface;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }



    public function index(Request $request)
    {
        return $this->user->index($request);
    }



    public function show($id)
    {
        return $this->user->show($id);
    }



    public function store(UserStoreRequest $request)
    {
        return $this->user->store($request);
    }



    public function update(UserUpdateRequest $request)
    {
        return $this->user->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->user->destroy($request);
    }



    public function deleteSelected(Request $request)
    {
        return $this->user->deleteSelected($request);
    }
}

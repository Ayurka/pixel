<?php


namespace App\Repositories\Backend\User;

use App\Repositories\Backend\CrudRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Validator;

class UserRepository implements CrudRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function paginate(int $number)
    {
        return $this->model->where('is_admin', 0)->orderBy('created_at', 'desc')->paginate($number);
    }

    public function create(array $data)
    {
        return $this->model->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'is_admin' => 0
        ]);
    }

    public function update(array $data, $id)
    {
        $this->validator($data)->validate();

        $model = $this->show($id);

        if ($data['password']) {

            $this->validatePassword($data)->validate();

            $model->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'is_admin' => 0
            ]);
        } else {
            $model->name = $data['name'];
            $model->email = $data['email'];
            $model->is_admin = 0;
            $model->save();
        }

        return $model;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['confirmed'],
        ]);
    }

    protected function validatePassword(array $data)
    {
        return Validator::make($data, [
            'password' => ['string', 'min:8', 'confirmed'],
        ]);
    }
}
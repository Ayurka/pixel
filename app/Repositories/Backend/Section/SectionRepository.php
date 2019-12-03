<?php


namespace App\Repositories\Backend\Section;

use App\Models\Section;
use App\Repositories\Backend\CrudRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class SectionRepository implements CrudRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new Section();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function paginate(int $number)
    {
        return $this->model->with('getPivotUsers')->orderBy('created_at', 'desc')->paginate($number);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $model = $this->show($id);
        $model->update($data);

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

    public function setImage($model, $request)
    {
        if ($request->hasfile('logo')) {
            $path = Storage::disk('public')->putFile('/files', $request->file('logo'));

            $model->update(['logo' => $path]);
        }
    }
}
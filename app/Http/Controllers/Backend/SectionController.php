<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Repositories\Backend\CrudRepositoryInterface;
use App\User;

class SectionController extends Controller
{
    protected $model;

    public function __construct(CrudRepositoryInterface $crud)
    {
        $this->model = $crud;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sections = $this->model->paginate(4);

        return view('backend.section.index', compact('sections'));
    }

    /**
     * @param User $user
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $users = $user->where('is_admin', 0)->get();

        return view('backend.section.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        $model = $this->model->create($request->all());

        $model->getPivotUsers()->sync($request->get('users'));

        $this->model->setImage($model, $request);

        return redirect()->route('admin.section.index')->with('flash_success', __('alert.section_create'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id, User $user)
    {
        $section = $this->model->show($id);

        $users = $user->where('is_admin', 0)->get();

        return view('backend.section.edit', compact('section', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SectionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SectionRequest $request, $id)
    {

        $model = $this->model->update($request->all(), $id);

        $model->getPivotUsers()->sync($request->get('users'));

        $this->model->setImage($model, $request);

        return redirect()->route('admin.section.index')->with('flash_success', __('alert.section_edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);

        return redirect()->route('admin.section.index')->with('flash_success', __('alert.section_delete'));
    }
}

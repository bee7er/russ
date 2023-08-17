<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Tutorial;
use App\Http\Requests\Admin\TutorialRequest;
use Datatables;

class TutorialController extends AdminController
{
    /**
     * TutorialController constructor.
     */
    public function __construct()
    {
        view()->share('type', 'tutorial');
    }

    /**
     * Show a list of all the tutorial posts.
     *
     * @return View
     */
    public function index()
    {
        $tutorials = $this->getTutorials();

        // Show the page
        return view('admin.tutorial.index', compact('tutorials'));
    }

    /**
     * Show the form for creating a new tutorial.
     *
     * @return Response
     */
    public function create()
    {
        // Show the page
        return view('admin.tutorial.create_edit');
    }

    /**
     * Store a newly created tutorial in storage.
     *
     * @param TutorialRequest $request
     * @return Response
     */
    public function store(TutorialRequest $request)
    {
        $tutorial = new Tutorial($request->all());

        $tutorial->save();
    }

    public function edit(Tutorial $tutorial)
    {
        return view('admin.tutorial.create_edit', compact('tutorial'));
    }

    /**
     * Update the specified tutorial in storage.
     *
     * @param TutorialRequest $request
     * @param Tutorial $tutorial
     * @return Response
     * @internal param int $id
     */
    public function update(TutorialRequest $request, Tutorial $tutorial)
    {
        $tutorial->update($request->all());
    }

    /**
     * Remove the specified tutorial from storage.
     *
     * @param $id
     * @return Response
     */

    public function delete(Tutorial $tutorial)
    {
        return view('admin.tutorial.delete', compact('tutorial'));
    }

    /**
     * Remove the specified tutorial from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy(Tutorial $tutorial)
    {
        $tutorial->delete();
    }

    /**
     * Get all tutorials
     *
     * @return array
     */
    public function getTutorials()
    {
        return Tutorial::orderBy('seq', 'ASC')
            ->get()
            ->map(function ($tutorial) {
                return [
                    'id' => $tutorial->id,
                    'seq' => $tutorial->seq,
                    'title' => $tutorial->title,
                    'created_at' => $tutorial->created_at->format('d/m/Y'),
                ];
            });
    }

    /**
     * Show a list of all the tutorial posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $tutorials = $this->getTutorials();

        return Datatables::of($tutorials)
            ->add_column('actions', '<a href="{{{ url(\'admin/tutorial/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                <a href="{{{ url(\'admin/tutorial/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
                <input type="hidden" name="row" value="{{$id}}" id="row">')
            ->remove_column('id')
            ->make();
    }
}

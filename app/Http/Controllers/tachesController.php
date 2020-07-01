<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetachesRequest;
use App\Http\Requests\UpdatetachesRequest;
use App\Repositories\tachesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tachesController extends AppBaseController
{
    /** @var  tachesRepository */
    private $tachesRepository;

    public function __construct(tachesRepository $tachesRepo)
    {
        $this->tachesRepository = $tachesRepo;
    }

    /**
     * Display a listing of the taches.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $taches = $this->tachesRepository->paginate(10);

        return view('taches.index')
            ->with('taches', $taches);
    }

    /**
     * Show the form for creating a new taches.
     *
     * @return Response
     */
    public function create()
    {
        return view('taches.create');
    }

    /**
     * Store a newly created taches in storage.
     *
     * @param CreatetachesRequest $request
     *
     * @return Response
     */
    public function store(CreatetachesRequest $request)
    {
        $input = $request->all();

        $taches = $this->tachesRepository->create($input);

        Flash::success('Taches saved successfully.');

        return redirect(route('taches.index'));
    }

    /**
     * Display the specified taches.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $taches = $this->tachesRepository->find($id);

        if (empty($taches)) {
            Flash::error('Taches not found');

            return redirect(route('taches.index'));
        }

        return view('taches.show')->with('taches', $taches);
    }

    /**
     * Show the form for editing the specified taches.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $taches = $this->tachesRepository->find($id);

        if (empty($taches)) {
            Flash::error('Taches not found');

            return redirect(route('taches.index'));
        }

        return view('taches.edit')->with('taches', $taches);
    }

    /**
     * Update the specified taches in storage.
     *
     * @param int $id
     * @param UpdatetachesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetachesRequest $request)
    {
        $taches = $this->tachesRepository->find($id);

        if (empty($taches)) {
            Flash::error('Taches not found');

            return redirect(route('taches.index'));
        }

        $taches = $this->tachesRepository->update($request->all(), $id);

        Flash::success('Taches updated successfully.');

        return redirect(route('taches.index'));
    }

    /**
     * Remove the specified taches from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $taches = $this->tachesRepository->find($id);

        if (empty($taches)) {
            Flash::error('Taches not found');

            return redirect(route('taches.index'));
        }

        $this->tachesRepository->delete($id);

        Flash::success('Taches deleted successfully.');

        return redirect(route('taches.index'));
    }
}

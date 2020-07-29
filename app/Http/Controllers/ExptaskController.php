<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExptaskRequest;
use App\Http\Requests\UpdateExptaskRequest;
use App\Repositories\ExptaskRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ExptaskController extends AppBaseController
{
    /** @var  ExptaskRepository */
    private $exptaskRepository;

    public function __construct(ExptaskRepository $exptaskRepo)
    {
        $this->exptaskRepository = $exptaskRepo;
    }

    /**
     * Display a listing of the Exptask.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $exptasks = $this->exptaskRepository->paginate(10);

        return view('exptasks.index')
            ->with('exptasks', $exptasks);
    }

    /**
     * Show the form for creating a new Exptask.
     *
     * @return Response
     */
    public function create()
    {
        return view('exptasks.create');
    }

    /**
     * Store a newly created Exptask in storage.
     *
     * @param CreateExptaskRequest $request
     *
     * @return Response
     */
    public function store(CreateExptaskRequest $request)
    {
        $input = $request->all();

        $exptask = $this->exptaskRepository->create($input);

        Flash::success('Exptask saved successfully.');

        return redirect(route('exptasks.index'));
    }

    /**
     * Display the specified Exptask.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $exptask = $this->exptaskRepository->find($id);

        if (empty($exptask)) {
            Flash::error('Exptask not found');

            return redirect(route('exptasks.index'));
        }

        return view('exptasks.show')->with('exptask', $exptask);
    }

    /**
     * Show the form for editing the specified Exptask.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $exptask = $this->exptaskRepository->find($id);

        if (empty($exptask)) {
            Flash::error('Exptask not found');

            return redirect(route('exptasks.index'));
        }

        return view('exptasks.edit')->with('exptask', $exptask);
    }

    /**
     * Update the specified Exptask in storage.
     *
     * @param int $id
     * @param UpdateExptaskRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExptaskRequest $request)
    {
        $exptask = $this->exptaskRepository->find($id);

        if (empty($exptask)) {
            Flash::error('Exptask not found');

            return redirect(route('exptasks.index'));
        }

        $exptask = $this->exptaskRepository->update($request->all(), $id);

        Flash::success('Exptask updated successfully.');

        return redirect(route('exptasks.index'));
    }

    /**
     * Remove the specified Exptask from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $exptask = $this->exptaskRepository->find($id);

        if (empty($exptask)) {
            Flash::error('Exptask not found');

            return redirect(route('exptasks.index'));
        }

        $this->exptaskRepository->delete($id);

        Flash::success('Exptask deleted successfully.');

        return redirect(route('exptasks.index'));
    }
}

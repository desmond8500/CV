<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetachesAPIRequest;
use App\Http\Requests\API\UpdatetachesAPIRequest;
use App\Models\taches;
use App\Repositories\tachesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tachesController
 * @package App\Http\Controllers\API
 */

class tachesAPIController extends AppBaseController
{
    /** @var  tachesRepository */
    private $tachesRepository;

    public function __construct(tachesRepository $tachesRepo)
    {
        $this->tachesRepository = $tachesRepo;
    }

    /**
     * Display a listing of the taches.
     * GET|HEAD /taches
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $taches = $this->tachesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($taches->toArray(), 'Taches retrieved successfully');
    }

    /**
     * Store a newly created taches in storage.
     * POST /taches
     *
     * @param CreatetachesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetachesAPIRequest $request)
    {
        $input = $request->all();

        $taches = $this->tachesRepository->create($input);

        return $this->sendResponse($taches->toArray(), 'Taches saved successfully');
    }

    /**
     * Display the specified taches.
     * GET|HEAD /taches/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var taches $taches */
        $taches = $this->tachesRepository->find($id);

        if (empty($taches)) {
            return $this->sendError('Taches not found');
        }

        return $this->sendResponse($taches->toArray(), 'Taches retrieved successfully');
    }

    /**
     * Update the specified taches in storage.
     * PUT/PATCH /taches/{id}
     *
     * @param int $id
     * @param UpdatetachesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetachesAPIRequest $request)
    {
        $input = $request->all();

        /** @var taches $taches */
        $taches = $this->tachesRepository->find($id);

        if (empty($taches)) {
            return $this->sendError('Taches not found');
        }

        $taches = $this->tachesRepository->update($input, $id);

        return $this->sendResponse($taches->toArray(), 'taches updated successfully');
    }

    /**
     * Remove the specified taches from storage.
     * DELETE /taches/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var taches $taches */
        $taches = $this->tachesRepository->find($id);

        if (empty($taches)) {
            return $this->sendError('Taches not found');
        }

        $taches->delete();

        return $this->sendSuccess('Taches deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTacheAPIRequest;
use App\Http\Requests\API\UpdateTacheAPIRequest;
use App\Models\Tache;
use App\Repositories\TacheRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TacheController
 * @package App\Http\Controllers\API
 */

class TacheAPIController extends AppBaseController
{
    /** @var  TacheRepository */
    private $tacheRepository;

    public function __construct(TacheRepository $tacheRepo)
    {
        $this->tacheRepository = $tacheRepo;
    }

    /**
     * Display a listing of the Tache.
     * GET|HEAD /taches
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $taches = $this->tacheRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($taches->toArray(), 'Taches retrieved successfully');
    }

    /**
     * Store a newly created Tache in storage.
     * POST /taches
     *
     * @param CreateTacheAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTacheAPIRequest $request)
    {
        $input = $request->all();

        $tache = $this->tacheRepository->create($input);

        return $this->sendResponse($tache->toArray(), 'Tache saved successfully');
    }

    /**
     * Display the specified Tache.
     * GET|HEAD /taches/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tache $tache */
        $tache = $this->tacheRepository->find($id);

        if (empty($tache)) {
            return $this->sendError('Tache not found');
        }

        return $this->sendResponse($tache->toArray(), 'Tache retrieved successfully');
    }

    /**
     * Update the specified Tache in storage.
     * PUT/PATCH /taches/{id}
     *
     * @param int $id
     * @param UpdateTacheAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTacheAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tache $tache */
        $tache = $this->tacheRepository->find($id);

        if (empty($tache)) {
            return $this->sendError('Tache not found');
        }

        $tache = $this->tacheRepository->update($input, $id);

        return $this->sendResponse($tache->toArray(), 'Tache updated successfully');
    }

    /**
     * Remove the specified Tache from storage.
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
        /** @var Tache $tache */
        $tache = $this->tacheRepository->find($id);

        if (empty($tache)) {
            return $this->sendError('Tache not found');
        }

        $tache->delete();

        return $this->sendSuccess('Tache deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEtat_CivilAPIRequest;
use App\Http\Requests\API\UpdateEtat_CivilAPIRequest;
use App\Models\Etat_Civil;
use App\Repositories\Etat_CivilRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Etat_CivilController
 * @package App\Http\Controllers\API
 */

class Etat_CivilAPIController extends AppBaseController
{
    /** @var  Etat_CivilRepository */
    private $etatCivilRepository;

    public function __construct(Etat_CivilRepository $etatCivilRepo)
    {
        $this->etatCivilRepository = $etatCivilRepo;
    }

    /**
     * Display a listing of the Etat_Civil.
     * GET|HEAD /etatCivils
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $etatCivils = $this->etatCivilRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($etatCivils->toArray(), 'Etat  Civils retrieved successfully');
    }

    /**
     * Store a newly created Etat_Civil in storage.
     * POST /etatCivils
     *
     * @param CreateEtat_CivilAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEtat_CivilAPIRequest $request)
    {
        $input = $request->all();

        $etatCivil = $this->etatCivilRepository->create($input);

        return $this->sendResponse($etatCivil->toArray(), 'Etat  Civil saved successfully');
    }

    /**
     * Display the specified Etat_Civil.
     * GET|HEAD /etatCivils/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Etat_Civil $etatCivil */
        $etatCivil = $this->etatCivilRepository->find($id);

        if (empty($etatCivil)) {
            return $this->sendError('Etat  Civil not found');
        }

        return $this->sendResponse($etatCivil->toArray(), 'Etat  Civil retrieved successfully');
    }

    /**
     * Update the specified Etat_Civil in storage.
     * PUT/PATCH /etatCivils/{id}
     *
     * @param int $id
     * @param UpdateEtat_CivilAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEtat_CivilAPIRequest $request)
    {
        $input = $request->all();

        /** @var Etat_Civil $etatCivil */
        $etatCivil = $this->etatCivilRepository->find($id);

        if (empty($etatCivil)) {
            return $this->sendError('Etat  Civil not found');
        }

        $etatCivil = $this->etatCivilRepository->update($input, $id);

        return $this->sendResponse($etatCivil->toArray(), 'Etat_Civil updated successfully');
    }

    /**
     * Remove the specified Etat_Civil from storage.
     * DELETE /etatCivils/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Etat_Civil $etatCivil */
        $etatCivil = $this->etatCivilRepository->find($id);

        if (empty($etatCivil)) {
            return $this->sendError('Etat  Civil not found');
        }

        $etatCivil->delete();

        return $this->sendSuccess('Etat  Civil deleted successfully');
    }
}

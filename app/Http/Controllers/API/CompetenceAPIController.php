<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCompetenceAPIRequest;
use App\Http\Requests\API\UpdateCompetenceAPIRequest;
use App\Models\Competence;
use App\Repositories\CompetenceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CompetenceController
 * @package App\Http\Controllers\API
 */

class CompetenceAPIController extends AppBaseController
{
    /** @var  CompetenceRepository */
    private $competenceRepository;

    public function __construct(CompetenceRepository $competenceRepo)
    {
        $this->competenceRepository = $competenceRepo;
    }

    /**
     * Display a listing of the Competence.
     * GET|HEAD /competences
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $competences = $this->competenceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($competences->toArray(), 'Competences retrieved successfully');
    }

    /**
     * Store a newly created Competence in storage.
     * POST /competences
     *
     * @param CreateCompetenceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCompetenceAPIRequest $request)
    {
        $input = $request->all();

        $competence = $this->competenceRepository->create($input);

        return $this->sendResponse($competence->toArray(), 'Competence saved successfully');
    }

    /**
     * Display the specified Competence.
     * GET|HEAD /competences/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Competence $competence */
        $competence = $this->competenceRepository->find($id);

        if (empty($competence)) {
            return $this->sendError('Competence not found');
        }

        return $this->sendResponse($competence->toArray(), 'Competence retrieved successfully');
    }

    /**
     * Update the specified Competence in storage.
     * PUT/PATCH /competences/{id}
     *
     * @param int $id
     * @param UpdateCompetenceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompetenceAPIRequest $request)
    {
        $input = $request->all();

        /** @var Competence $competence */
        $competence = $this->competenceRepository->find($id);

        if (empty($competence)) {
            return $this->sendError('Competence not found');
        }

        $competence = $this->competenceRepository->update($input, $id);

        return $this->sendResponse($competence->toArray(), 'Competence updated successfully');
    }

    /**
     * Remove the specified Competence from storage.
     * DELETE /competences/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Competence $competence */
        $competence = $this->competenceRepository->find($id);

        if (empty($competence)) {
            return $this->sendError('Competence not found');
        }

        $competence->delete();

        return $this->sendSuccess('Competence deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateExptaskAPIRequest;
use App\Http\Requests\API\UpdateExptaskAPIRequest;
use App\Models\Exptask;
use App\Repositories\ExptaskRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ExptaskController
 * @package App\Http\Controllers\API
 */

class ExptaskAPIController extends AppBaseController
{
    /** @var  ExptaskRepository */
    private $exptaskRepository;

    public function __construct(ExptaskRepository $exptaskRepo)
    {
        $this->exptaskRepository = $exptaskRepo;
    }

    /**
     * Display a listing of the Exptask.
     * GET|HEAD /exptasks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $exptasks = $this->exptaskRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($exptasks->toArray(), 'Exptasks retrieved successfully');
    }

    /**
     * Store a newly created Exptask in storage.
     * POST /exptasks
     *
     * @param CreateExptaskAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateExptaskAPIRequest $request)
    {
        $input = $request->all();

        $exptask = $this->exptaskRepository->create($input);

        return $this->sendResponse($exptask->toArray(), 'Exptask saved successfully');
    }

    /**
     * Display the specified Exptask.
     * GET|HEAD /exptasks/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Exptask $exptask */
        $exptask = $this->exptaskRepository->find($id);

        if (empty($exptask)) {
            return $this->sendError('Exptask not found');
        }

        return $this->sendResponse($exptask->toArray(), 'Exptask retrieved successfully');
    }

    /**
     * Update the specified Exptask in storage.
     * PUT/PATCH /exptasks/{id}
     *
     * @param int $id
     * @param UpdateExptaskAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExptaskAPIRequest $request)
    {
        $input = $request->all();

        /** @var Exptask $exptask */
        $exptask = $this->exptaskRepository->find($id);

        if (empty($exptask)) {
            return $this->sendError('Exptask not found');
        }

        $exptask = $this->exptaskRepository->update($input, $id);

        return $this->sendResponse($exptask->toArray(), 'Exptask updated successfully');
    }

    /**
     * Remove the specified Exptask from storage.
     * DELETE /exptasks/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Exptask $exptask */
        $exptask = $this->exptaskRepository->find($id);

        if (empty($exptask)) {
            return $this->sendError('Exptask not found');
        }

        $exptask->delete();

        return $this->sendSuccess('Exptask deleted successfully');
    }
}

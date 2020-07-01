<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInteretAPIRequest;
use App\Http\Requests\API\UpdateInteretAPIRequest;
use App\Models\Interet;
use App\Repositories\InteretRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class InteretController
 * @package App\Http\Controllers\API
 */

class InteretAPIController extends AppBaseController
{
    /** @var  InteretRepository */
    private $interetRepository;

    public function __construct(InteretRepository $interetRepo)
    {
        $this->interetRepository = $interetRepo;
    }

    /**
     * Display a listing of the Interet.
     * GET|HEAD /interets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $interets = $this->interetRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($interets->toArray(), 'Interets retrieved successfully');
    }

    /**
     * Store a newly created Interet in storage.
     * POST /interets
     *
     * @param CreateInteretAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateInteretAPIRequest $request)
    {
        $input = $request->all();

        $interet = $this->interetRepository->create($input);

        return $this->sendResponse($interet->toArray(), 'Interet saved successfully');
    }

    /**
     * Display the specified Interet.
     * GET|HEAD /interets/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Interet $interet */
        $interet = $this->interetRepository->find($id);

        if (empty($interet)) {
            return $this->sendError('Interet not found');
        }

        return $this->sendResponse($interet->toArray(), 'Interet retrieved successfully');
    }

    /**
     * Update the specified Interet in storage.
     * PUT/PATCH /interets/{id}
     *
     * @param int $id
     * @param UpdateInteretAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInteretAPIRequest $request)
    {
        $input = $request->all();

        /** @var Interet $interet */
        $interet = $this->interetRepository->find($id);

        if (empty($interet)) {
            return $this->sendError('Interet not found');
        }

        $interet = $this->interetRepository->update($input, $id);

        return $this->sendResponse($interet->toArray(), 'Interet updated successfully');
    }

    /**
     * Remove the specified Interet from storage.
     * DELETE /interets/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Interet $interet */
        $interet = $this->interetRepository->find($id);

        if (empty($interet)) {
            return $this->sendError('Interet not found');
        }

        $interet->delete();

        return $this->sendSuccess('Interet deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLangueAPIRequest;
use App\Http\Requests\API\UpdateLangueAPIRequest;
use App\Models\Langue;
use App\Repositories\LangueRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LangueController
 * @package App\Http\Controllers\API
 */

class LangueAPIController extends AppBaseController
{
    /** @var  LangueRepository */
    private $langueRepository;

    public function __construct(LangueRepository $langueRepo)
    {
        $this->langueRepository = $langueRepo;
    }

    /**
     * Display a listing of the Langue.
     * GET|HEAD /langues
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $langues = $this->langueRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($langues->toArray(), 'Langues retrieved successfully');
    }

    /**
     * Store a newly created Langue in storage.
     * POST /langues
     *
     * @param CreateLangueAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLangueAPIRequest $request)
    {
        $input = $request->all();

        $langue = $this->langueRepository->create($input);

        return $this->sendResponse($langue->toArray(), 'Langue saved successfully');
    }

    /**
     * Display the specified Langue.
     * GET|HEAD /langues/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Langue $langue */
        $langue = $this->langueRepository->find($id);

        if (empty($langue)) {
            return $this->sendError('Langue not found');
        }

        return $this->sendResponse($langue->toArray(), 'Langue retrieved successfully');
    }

    /**
     * Update the specified Langue in storage.
     * PUT/PATCH /langues/{id}
     *
     * @param int $id
     * @param UpdateLangueAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLangueAPIRequest $request)
    {
        $input = $request->all();

        /** @var Langue $langue */
        $langue = $this->langueRepository->find($id);

        if (empty($langue)) {
            return $this->sendError('Langue not found');
        }

        $langue = $this->langueRepository->update($input, $id);

        return $this->sendResponse($langue->toArray(), 'Langue updated successfully');
    }

    /**
     * Remove the specified Langue from storage.
     * DELETE /langues/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Langue $langue */
        $langue = $this->langueRepository->find($id);

        if (empty($langue)) {
            return $this->sendError('Langue not found');
        }

        $langue->delete();

        return $this->sendSuccess('Langue deleted successfully');
    }
}

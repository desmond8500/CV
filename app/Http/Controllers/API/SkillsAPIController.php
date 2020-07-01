<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSkillsAPIRequest;
use App\Http\Requests\API\UpdateSkillsAPIRequest;
use App\Models\Skills;
use App\Repositories\SkillsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SkillsController
 * @package App\Http\Controllers\API
 */

class SkillsAPIController extends AppBaseController
{
    /** @var  SkillsRepository */
    private $skillsRepository;

    public function __construct(SkillsRepository $skillsRepo)
    {
        $this->skillsRepository = $skillsRepo;
    }

    /**
     * Display a listing of the Skills.
     * GET|HEAD /skills
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $skills = $this->skillsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($skills->toArray(), 'Skills retrieved successfully');
    }

    /**
     * Store a newly created Skills in storage.
     * POST /skills
     *
     * @param CreateSkillsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSkillsAPIRequest $request)
    {
        $input = $request->all();

        $skills = $this->skillsRepository->create($input);

        return $this->sendResponse($skills->toArray(), 'Skills saved successfully');
    }

    /**
     * Display the specified Skills.
     * GET|HEAD /skills/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Skills $skills */
        $skills = $this->skillsRepository->find($id);

        if (empty($skills)) {
            return $this->sendError('Skills not found');
        }

        return $this->sendResponse($skills->toArray(), 'Skills retrieved successfully');
    }

    /**
     * Update the specified Skills in storage.
     * PUT/PATCH /skills/{id}
     *
     * @param int $id
     * @param UpdateSkillsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSkillsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Skills $skills */
        $skills = $this->skillsRepository->find($id);

        if (empty($skills)) {
            return $this->sendError('Skills not found');
        }

        $skills = $this->skillsRepository->update($input, $id);

        return $this->sendResponse($skills->toArray(), 'Skills updated successfully');
    }

    /**
     * Remove the specified Skills from storage.
     * DELETE /skills/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Skills $skills */
        $skills = $this->skillsRepository->find($id);

        if (empty($skills)) {
            return $this->sendError('Skills not found');
        }

        $skills->delete();

        return $this->sendSuccess('Skills deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEtat_CivilRequest;
use App\Http\Requests\UpdateEtat_CivilRequest;
use App\Repositories\Etat_CivilRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Etat_CivilController extends AppBaseController
{
    /** @var  Etat_CivilRepository */
    private $etatCivilRepository;

    public function __construct(Etat_CivilRepository $etatCivilRepo)
    {
        $this->etatCivilRepository = $etatCivilRepo;
    }

    /**
     * Display a listing of the Etat_Civil.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $etatCivils = $this->etatCivilRepository->paginate(10);

        return view('etat__civils.index')
            ->with('etatCivils', $etatCivils);
    }

    /**
     * Show the form for creating a new Etat_Civil.
     *
     * @return Response
     */
    public function create()
    {
        return view('etat__civils.create');
    }

    /**
     * Store a newly created Etat_Civil in storage.
     *
     * @param CreateEtat_CivilRequest $request
     *
     * @return Response
     */
    public function store(CreateEtat_CivilRequest $request)
    {
        $input = $request->all();

        $etatCivil = $this->etatCivilRepository->create($input);

        Flash::success('Etat  Civil saved successfully.');

        return redirect(route('etatCivils.index'));
    }

    /**
     * Display the specified Etat_Civil.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $etatCivil = $this->etatCivilRepository->find($id);

        if (empty($etatCivil)) {
            Flash::error('Etat  Civil not found');

            return redirect(route('etatCivils.index'));
        }

        return view('etat__civils.show')->with('etatCivil', $etatCivil);
    }

    /**
     * Show the form for editing the specified Etat_Civil.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $etatCivil = $this->etatCivilRepository->find($id);

        if (empty($etatCivil)) {
            Flash::error('Etat  Civil not found');

            return redirect(route('etatCivils.index'));
        }

        return view('etat__civils.edit')->with('etatCivil', $etatCivil);
    }

    /**
     * Update the specified Etat_Civil in storage.
     *
     * @param int $id
     * @param UpdateEtat_CivilRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEtat_CivilRequest $request)
    {
        $etatCivil = $this->etatCivilRepository->find($id);

        if (empty($etatCivil)) {
            Flash::error('Etat  Civil not found');

            return redirect(route('etatCivils.index'));
        }

        $etatCivil = $this->etatCivilRepository->update($request->all(), $id);

        Flash::success('Etat  Civil updated successfully.');

        return redirect(route('etatCivils.index'));
    }

    /**
     * Remove the specified Etat_Civil from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $etatCivil = $this->etatCivilRepository->find($id);

        if (empty($etatCivil)) {
            Flash::error('Etat  Civil not found');

            return redirect(route('etatCivils.index'));
        }

        $this->etatCivilRepository->delete($id);

        Flash::success('Etat  Civil deleted successfully.');

        return redirect(route('etatCivils.index'));
    }
}

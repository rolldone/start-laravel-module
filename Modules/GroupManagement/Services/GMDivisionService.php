<?php

namespace Modules\GroupManagement\Services;

use Error;
use Exception;
use Modules\GroupManagement\Classes\GMDivisionClasses;
use Modules\GroupManagement\Entities\GMDivision;

class GMDivisionService
{

	public function __construct()
	{
	}

	/**
	 * addDivision
	 *
	 * @param  mixed $props
	 * @return GMDivisionClasses
	 */
	public function addDivision($props, $exist = null)
	{
		try {
			$gMDivisionModel = $exist ?? new GMDivision();
			$gMDivisionModel->name = $props["name"];
			$gMDivisionModel->is_enable = $props["is_enable"] == "true" ? true : false;
			$gMDivisionModel->parent_id = $props["parent_id"];
			$gMDivisionModel->save();
			return GMDivisionClasses::set($gMDivisionModel);
		} catch (Exception $ex) {
			throw $ex;
		}
	}

	public function updateDivision($props)
	{
		try {
			$gMDivisionModel = GMDivision::find($props['id']);
			if ($gMDivisionModel == null) {
				throw new Error("Division model not found :(");
			}
			return $this->addDivision($props, $gMDivisionModel);
		} catch (Exception $ex) {
			throw $ex;
		}
	}

	public function deleteDivision(GMDivisionClasses $gMDivision)
	{
		$gMDivisionModel = GMDivision::find($gMDivision->getId());
		if ($gMDivisionModel == null) {
			throw new Error("Division model not found :(");
		}
		$gMDivisionModel = $gMDivisionModel->delete();

		return $gMDivisionModel;
	}

	public function deleteDivisionById(int $id)
	{
		$gMDivisionModel = GMDivision::find($id);
		if ($gMDivisionModel == null) {
			throw new Error("Division model not found :(");
		}
		$gMDivisionModel = $gMDivisionModel->delete();

		return $gMDivisionModel;
	}

	public function getDivisionById_IdUser(int $id, int $user_id)
	{
	}

	public function getDivisionById(int $id)
	{
		$gMDivisionModel = GMDivision::find($id);
		return GMDivisionClasses::set($gMDivisionModel);
	}

	public function getDivisions($props)
	{
		$gMDivisionModel = GMDivision::take($props["take"])->skip($props["take"] * $props["skip"])->with(["parent_division"])->get();
		return GMDivisionClasses::sets($gMDivisionModel);
	}
}

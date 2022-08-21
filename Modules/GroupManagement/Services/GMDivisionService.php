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

	public function addDivision(GMDivisionClasses $gMDivision)
	{
		try {
			$gMDivisionModel = new GMDivision();
			$gMDivisionModel->name = $gMDivision->getName();
			$gMDivisionModel->is_enable = $gMDivision->getIs_enable();
			$gMDivisionModel->parent_id = $gMDivision->getParent_id();
			$gMDivisionModel->save();

			return $gMDivisionModel;
		} catch (Exception $ex) {
			throw $ex;
		}
	}

	public function updateDivision(GMDivisionClasses $gMDivision)
	{
		try {
			$gMDivisionModel = GMDivision::find($gMDivision->getId());
			if ($gMDivisionModel == null) {
				throw new Error("Division model not found :(");
			}
			$gMDivisionModel->name = $gMDivision->getName() ?? $gMDivisionModel->name;
			$gMDivisionModel->is_enable = $gMDivision->getIs_enable() ?? $gMDivisionModel->is_enable;
			$gMDivisionModel->parent_id = $gMDivision->getParent_id();
			$gMDivisionModel->save();

			return $gMDivisionModel;
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
		return $gMDivisionModel;
	}

	public function getDivisions($props)
	{
		$gMDivisionModel = GMDivision::take(100)->skip(0)->get();
		return $gMDivisionModel;
	}
}

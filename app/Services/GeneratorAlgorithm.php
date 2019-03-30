<?php

/*
* Expected output
* 
* $data = [
*	'senin' => [
*		'area 1' => ['a', 'b'],
*		'area 2' => ['c', 'd'],
*		'area 3' => ['e', 'f'],
*		'area 4' => ['g', 'h'],
*		'area 5' => ['i', 'j'],
*		'area 6' => ['k', 'l']
*		'WC 1' => 'm',
*		'WC 2' => 'n',
*		'WC 3' => 'o',
*		'WC 4' => 'p',
*		'WC 5' => 'q',
*		'WC 6' => 'r',
*	]
* ];
* Jika nama sebagai kromosom, maka tentu akan fokus menyeleksi area
*
*/

namespace App\Services;

use App\Day;
use App\Student;

class GeneratorAlgorithm
{

	private $gene;
	public $timeTable;
	private $sizeOfWeeks = 1;
	private $namesOfDays = [];
	public $namesOfStudents = [];
	public $chromosomes = [];

	public function __construct($gene)
	{
		$this->gene = $gene;
		$this->setNamesOfStudents(Student::all());
		$this->setNamesOfDays(Day::all());
		$this->initializeTimeTable();
	}

	public function initializeTimeTable()
	{
		return $this->timeTable = array();
	}

	public function makeChromosomes()
	{
		$chromosomes = array();
		foreach ($this->gene as $gene) {
			for ($i = 0; $i < $gene['capacity']; $i++) { 
				$chromosomes[$gene['code_area']][$i] = '';
			}
		}

		$this->chromosomes = $chromosomes;
		return $this;
	}

	public function createInitialGeneration()
	{
		foreach ($this->getNamesOfDays() as $day) {
			$this->timeTable[$day] = $this->chromosomes;
		}

		return $this;
	}

	public function startSelection()
	{
		$counter = 0;
		$full = false;
		$cloneTimeTable = $this->timeTable;
		$size = count($this->getNamesOfStudents());


		while ($full == false) {
			$rand = rand(0, $size-1);

			if (!$this->slotsAreEnough()) {
				foreach ($cloneTimeTable as $key => $value) {
					$area = array_keys($value);
				
					for ($i = 0; $i < count($area); $i++) {
						if (!$this->isUsedSlotsByDay($this->timeTable[$key][$area[$i]], $this->getNamesOfStudents()[$rand])) {
							$counter += 1;
							if ($counter < $this->getProbabilityChooses()) {
								$this->timeTable[$key][$area[$i]] = $this->getNamesOfStudents()[$rand];
							}
						} else {

						}
					}
				}
			} else {
				$full = true;
			}
		}
	}

	private function getProbabilityChooses()
	{
		return count($this->getNamesOfStudents())/$this->totalUnits() * count($this->getNamesOfDays());
	}

	private function slotsAreEnough()
	{
		$slots = 0;
		foreach ($this->timeTable as $key => $value) {
			foreach ($value as $slot) {
				for ($i = 0; $i < count($slot); $i++) { 
					if (!$slot[$i] === "") {
						$slots += 1;
					}
				}
			}
		}

		return $slots === $this->totalUnits();
	}

	private function isUsedSlotsByDay(array $areas, $hooman)
	{
		return strpos(implode(' ', $areas), $hooman) ? true : false;
	}

	private function getNamesOfDays()
	{
		return $this->namesOfDays;
	}

	private function getNamesOfStudents()
	{
		return $this->namesOfStudents;
	}

	private function setNamesOfDays(object $data)
	{
		$iteration = 0;
		foreach ($data as $day) {
			$this->namesOfDays[$iteration] = $day->name;
			$iteration++;
		}
		return $this;
	}

	private function setNamesOfStudents(object $data)
	{
		$iteration = 0;
		foreach ($data as $student) {
			$this->namesOfStudents[$iteration] = $student->name;
			$iteration++;
		}
		return $this;
	}

	private function totalUnits()
	{
		$units = 0;
		foreach ($this->gene as $gene) {
			$units += $gene['capacity'];
		}

		return $units;
	}
}
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

	public $timeTable = array();

	private $sizeOfWeeks = 1;

	private $namesOfDays = [];

	private $chromosomes = array();

	public function __construct($gene)
	{
		$this->gene = $gene;
		$this->setNamesOfDays(Day::all());
		$this->initializeTimeTable();
	}

	public function initializeTimeTable()
	{
		return $this->timeTable = array(array());
	}

	public function makeChromosomes()
	{
		$chromosomes = array();
		foreach ($this->gene as $gene) {
			for ($i = 0; $i < $gene['capacity']; $i++) { 
				$chromosomes[$gene['code_area']][$i] = '-';
			}
		}

		$this->chromosomes = $chromosomes;
		return $this;
	}

	public function createInitialGeneration()
	{
		$sizeOfDays = count(Day::all()->toArray()); 
		for ($j = 0; $j < $sizeOfDays; $j++) { 
			$indicator = $this->getNamesOfDays();
			$this->timeTable[$indicator[$j]] = $this->chromosomes;
		}

		return $this;
	}

	public function startSelection()
	{
		$size = count(Student::all()->toArray());
		$cloneTimeTable = $this->timeTable;

		for ($i = 0; $i < $size; $i++) { 
		
			foreach ($this->timeTable as $key => $value) {
				foreach ($value as $area) {
				}
			}
		}
		var_dump($cloneTimeTable['Oke']);
	}

	private function getNamesOfDays()
	{
		return $this->namesOfDays;
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

	public function totalUnits()
	{
		$totalUnits = 0;

		foreach ($this->gene as $gene) {
			$totalUnits += $gene['capacity'];	
		}
		return $totalUnits;
	}
}
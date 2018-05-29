<?php
declare(strict_types = 1);
require_once('Details.php');
class Car
{
    /**
     * @var string
     */
    public $brand;
    /**
     * @var string
    */
    public $model;

    /**
     * @var int
     */
    public $year;

    /**
     * @var Details
     */
    private $details;

    public function __construct(string $brand, string $model)
    {
        $this->setBrand($brand);
        $this->setModel($model);
    }

    private function setBrand(string $brand) :void
    {
        if(strlen($brand) === 0) {
            throw new Exception("The brand shouldn't be empty!");
        }
        $this->brand = $brand;
    }

    private function setModel(string $model) :void
    {
        if(strlen($model) === 0) {
            throw new Exception("The brand shouldn't be empty!");
        }
        $this->model = $model;
    }

    public function setYear($year) :void
    {
        $convertedYear = intval($year);

        if((string)$year !== (string)$convertedYear || $year < 0) {
            throw new Exception("The year must be a positive integer number!");
        }
        $this->year = $year;
    }


    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @return string
     */
    public function getModel() :string
    {
        return $this->model;
    }

    /**
     * @return int
     */
    public function getYear() :int
    {
        return $this->year;
    }

    public function addDetails(?string &$engine, ?int &$seats, ?int &$horsepower) :void
    {
        $this->details = new Details($engine, $seats, $horsepower);
    }
}
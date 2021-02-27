<?php
// Solnieki
//Vārds, Vecums,( dzimšanas gads)
// Kurā klasē mācās?( skolu uzsāk 7-8 gados) 9-10 otrā klase,
//Iespēja mainīt klasi.

//Skola
//Skolao satur skolēnus
//Iespēja noskaidrot skolēnu mācās X klasē.
class Pupil
{
    private string $name;
    private string $birthday;
    public int $gradeCount;
    public int $changeGrade = 0;

    public function __construct(string $name, string $birthday)
    {
        $this->name = $name;
        $this->birthday = $birthday;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function calculateAge(): int
    {
        list($year, $month, $day) = explode(".", $this->birthday);
        $year_diff = date("Y") - $year;
        $month_diff = date("m") - $month;
        $day_diff = date("d") - $day;
        if ($day_diff < 0 && $month_diff == 0) $year_diff--;
        if ($day_diff < 0 && $month_diff < 0) $year_diff--;
        return $year_diff;
    }

    private function calculateGrade(): int
    {
        if ($this->changeGrade > 0) {
            return $this->gradeCount;
        } else {
            if ($this->calculateAge() === 7) {
                return $this->gradeCount = 1;
            } elseif ($this->calculateAge() === 8) {
                return $this->gradeCount = 2;
            } elseif ($this->calculateAge() === 9) {
                return $this->gradeCount = 3;
            } elseif ($this->calculateAge() === 10) {
                return $this->gradeCount = 4;
            } elseif ($this->calculateAge() === 11) {
                return $this->gradeCount = 5;
            } elseif ($this->calculateAge() === 12) {
                return $this->gradeCount = 6;
            } elseif ($this->calculateAge() === 13) {
                return $this->gradeCount = 7;
            } elseif ($this->calculateAge() === 14) {
                return $this->gradeCount = 8;
            } elseif ($this->calculateAge() === 15) {
                return $this->gradeCount = 9;
            } elseif ($this->calculateAge() > 15 || $this->calculateAge() < 7) {
                return $this->gradeCount = 0;
            }
        }
        return $this->gradeCount;
    }

    public function getGrade(): int
    {
        return $this->calculateGrade();
    }

    public function setGrade(int $classNumber): void
    {
        $this->gradeCount = $classNumber;
        $this->changeGrade++;
    }
}


class School
{
    private string $name;
    private array $students = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addStudent(Pupil $student): void
    {
        $this->students[] = $student;
    }

    public function addManyStudents(array $students): void
    {
        foreach ($students as $student) {
            $this->addStudent($student);
        }
    }
}

$school = new School('RTK');

$school->addStudent(new Pupil('Ritvars', '2010.12.05'));
$school->addStudent(new Pupil('Arturs', '2005.12.05'));
$school->addStudent(new Pupil('Karlis', '2009.05.05'));
$school->addStudent(new Pupil('Ilze', '2010.11.05'));
$school->addStudent(new Pupil('Agnese', '2009.02.05'));

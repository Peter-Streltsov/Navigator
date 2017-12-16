<?php

namespace Scientometrics\Models\Records;

use Scientometrics\Models\Records as Records;

class Grades extends Records\BaseModel
{
    public function getGrades()
    {
        $result = $this->fluent->from('grades')->select(null)->select(array('grades.id', 'grades.grade'));
        //return $data = $this->getArray($data);
        foreach ($result as $user) {
            $data[] = $user;
        }
        return $data;
    }
}

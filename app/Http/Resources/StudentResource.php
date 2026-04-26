<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;

class StudentResource extends UserBaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return array_merge(parent::toArray($request), [
            'school' => $this->student->school,
            'department' => $this->student->department,
            'level' => $this->student->level,
            'matricule' => $this->student->matricule,
            "verification_status" => $this->student->verification_status,
            "notifications" => $this->student->notifications,
        ]);
    }
}

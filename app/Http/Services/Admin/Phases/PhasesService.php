<?php

namespace App\Http\Services\Admin\Phases;

use App\Traits\ManegeImagesTrait;
use App\Models\Phase;

class PhasesService
{
    use ManegeImagesTrait;
    public function index($unit_id)
    {
        return Phase::where('unit_id', $unit_id)->oldest()->get();
    }

    public function store($unit_id,$data)
    {
        return Phase::create([
            'unit_id' => $unit_id,
            'title_ar' => $data['title_ar'],
            'title_en' => $data['title_en'],
            'description_ar' => $data['description_ar'],
            'description_en' => $data['description_en'],
            'image' => $this->uploadImage($data['image'], 'phases')
        ]);
    }

    public function edit($id)
    {
        return Phase::find($id);
    }

    public function update($id, $data)
    {
        $phase = Phase::find($id);
        if (!$phase) {
            return false;
        }
        if (isset($data['image'])) {
            $this->deleteImage($phase->image);
            $data['image'] = $this->uploadImage($data['image'], 'phases');
        }
        $phase->update($data);
        return $phase;
    }

    public function destroy($unit_id,$id)
    {
        $phase = Phase::find($id);
        if (!$phase) {
            return false;
        }
        $this->deleteImage($phase->image);
        if (!$phase->delete()) {
            return false;
        }
        return true;
    }

}
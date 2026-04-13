<?php
namespace App\Http\Services\Admin\Help;
use App\Models\Help;
use App\Traits\ManegeImagesTrait;

class HelpService
{
    use ManegeImagesTrait;
    public function getAllHelps()
    {
        return Help::all();
    }

    public function createHelp(array $data)
    {
        $data['image_icon'] = $this->uploadImage($data['image_icon']);
        Help::create($data);
    }

    public function getHelpById(string $id)
    {
        return Help::findOrFail($id);
    }

    public function updateHelp(string $id, array $data)
    {
        $help = Help::findOrFail($id);
        if(isset($data['image_icon'])){
            $this->deleteImage($help->image_icon);
            $data['image_icon'] = $this->uploadImage($data['image_icon']);
        }
        $help->update($data);
    }

    public function deleteHelp(string $id)
    {
        $help = Help::findOrFail($id);
        $this->deleteImage($help->image_icon);
        $help->delete();
    }
}
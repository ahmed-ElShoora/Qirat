<?php 
namespace App\Http\Services\Admin\Unit;
use App\Models\Unit;
use App\Models\Developer;
use App\Models\Type;
use App\Models\Signature;
use App\Traits\ManegeImagesTrait;

class UnitService
{
    use ManegeImagesTrait;
    public function index()
    {
        $units = Unit::select('id', 'title_ar','developer_id','type_id','project_state','other_type','is_promotion','is_hide')->with('developer:id,name_ar','type:id,name_ar')->latest()->get();
        return $units;
    }

    public function create()
    {
        $developers = Developer::select('id','name_ar')->get();
        $types = Type::select('id','name_ar')->get();
        $signatures = Signature::select('id','name_ar')->get();
        return [
            'developers' => $developers,
            'types' => $types,
            'signatures' => $signatures
        ];
    }

    public function store($data)
    {
        $isFirstUnit = Unit::count() === 0;

        $unit = Unit::create([
            'primary_image' => $this->uploadImage($data['primary_image'],'units/primary_images/'),
            'title_ar' => $data['title_ar'],
            'title_en' => $data['title_en'],
            'sqm' => $data['sqm'] ?? null,
            'address_ar' => $data['address_ar'] ?? null,
            'address_en' => $data['address_en'] ?? null,
            'type_id' => $data['type_id'],
            'developer_id' => $data['developer_id'],
            'other_type' => $data['other_type'],
            'project_state' => $data['project_state'],
            'developer_price' => $data['developer_price'],
            'down_payment_percentage' => $data['down_payment_percentage'],
            'years_count' => $data['years_count'],
            'resale_price' => $data['resale_price'] ?? null,
            'phone_number' => $data['phone_number'],
            'whatsapp' => $data['whatsapp'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],
            'bed_number' => $data['bed_number'] ?? null,
            'bathroom_number' => $data['bathroom_number'] ?? null,
            'master_plan' => $this->uploadImage($data['master_plan'],'units/master_plans/'),
            'digital_brochure' => isset($data['digital_brochure']) ? $this->uploadImage($data['digital_brochure'],'units/digital_brochures/') : null,
            'pay_amount_per_years' => $data['pay_amount_per_years'],
            'payment_percentage_per_year' => $data['payment_percentage_per_year'],
            'is_promotion' => $isFirstUnit ? true : false
        ]);
        $unit->signatures()->attach($data['signatures']);
        foreach($data['slider_images'] as $image){
            $unit->images()->create([
                'image' => $this->uploadImage($image,'units/slider_images/')
            ]);
        }

        return $unit ? true : false;
    }

    public function edit($id)
    {
        $developers = Developer::select('id','name_ar')->get();
        $types = Type::select('id','name_ar')->get();
        $signatures = Signature::select('id','name')->get();
        $unit = Unit::with('signatures:id,name')->findOrFail($id);
        return [
            'developers' => $developers,
            'types' => $types,
            'signatures' => $signatures,
            'unit' => $unit
        ];
    }

    public function update($data, $id)
    {
        $unit = Unit::findOrFail($id);
        $unit->fill([
            'title_ar' => $data['title_ar'],
            'title_en' => $data['title_en'],
            'sqm' => $data['sqm'] ?? null,
            'address_ar' => $data['address_ar'] ?? null,
            'address_en' => $data['address_en'] ?? null,
            'type_id' => $data['type_id'],
            'developer_id' => $data['developer_id'],
            'other_type' => $data['other_type'],
            'project_state' => $data['project_state'],
            'developer_price' => $data['developer_price'],
            'down_payment_percentage' => $data['down_payment_percentage'],
            'years_count' => $data['years_count'],
            'resale_price' => $data['resale_price'] ?? null,
            'phone_number' => $data['phone_number'],
            'whatsapp' => $data['whatsapp'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],
            'bed_number' => $data['bed_number'] ?? null,
            'bathroom_number' => $data['bathroom_number'] ?? null,
            'pay_amount_per_years' => $data['pay_amount_per_years'],
            'payment_percentage_per_year' => $data['payment_percentage_per_year']
        ]);
        if(isset($data['primary_image'])){
            $this->deleteImage($unit->primary_image);
            $unit->primary_image = $this->uploadImage($data['primary_image'],'units/primary_images/');
        }
        if(isset($data['master_plan'])){
            $this->deleteImage($unit->master_plan);
            $unit->master_plan = $this->uploadImage($data['master_plan'],'units/master_plans/');
        }
        if(isset($data['digital_brochure'])){
            if($unit->digital_brochure){
                $this->deleteImage($unit->digital_brochure);
            }
            $unit->digital_brochure = $this->uploadImage($data['digital_brochure'],'units/digital_brochures/');
        }
        $unit->save();
        $unit->signatures()->sync($data['signatures']);
        if(isset($data['slider_images'])){
            foreach($unit->images as $image){
                $this->deleteImage($image->image);
            }
            $unit->images()->delete();
            foreach($data['slider_images'] as $image){
                $unit->images()->create([
                    'image' => $this->uploadImage($image,'units/slider_images/')
                ]);
            }
        }
        return $unit ? true : false;
    }

    public function promotion($id)
    {
        Unit::query()->update([
            'is_promotion' => false
        ]);

        $unit = Unit::findOrFail($id);
        $unit->is_promotion = true;
        
        return $unit->save();
    }

    public function hide($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->is_hide = !$unit->is_hide;
        $unit->save();
        return $unit ? true : false;
    }

}
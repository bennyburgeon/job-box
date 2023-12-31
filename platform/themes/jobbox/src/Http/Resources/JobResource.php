<?php

namespace Theme\Jobbox\Http\Resources;

use Botble\JobBoard\Http\Resources\CompanyResource;
use Botble\JobBoard\Models\Job;
use Botble\Location\Http\Resources\CityResource;
use Botble\Location\Http\Resources\StateResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Botble\Media\Facades\RvMedia;

/**
 * @mixin Job
 */
class JobResource extends JsonResource
{
    public function toArray($request): array
    {
        return array_merge([
           'id' => $this->id,
           'name' => $this->name,
           'url' => $this->url,
           'description' => $this->description,
           'image' => $this->company->logo ? RvMedia::getImageUrl(
               $this->company->logo,
               null,
               false,
               RvMedia::getDefaultImage()
           ) : null,
           'company' => new CompanyResource($this->company),
           'date' => $this->created_at->translatedFormat('M d, Y'),
        ], is_plugin_active('location') ? [
            'city' => new CityResource($this->city),
            'state' => new StateResource($this->state),
        ] : []);
    }
}

<?php /** @noinspection ALL */

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\UpdateOrCreateRequest;
use App\Http\Resources\VuejobResource;
use App\Models\Company;
use App\Models\Vuejob;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use stdClass;

class VuejobService
{

    public function getFormattedJob(Vuejob $job): VuejobResource
    {
        return new VuejobResource($job->load('company'));
    }

    public function getFormattedJobs(): AnonymousResourceCollection
    {
        return VuejobResource::collection(Vuejob::with('company')->get());
    }

    public function createJob(UpdateOrCreateRequest $request): int
    {
        $request->validated();

        $company = Company::updateOrCreate(
            [
                'name' => $request->company['name'],
                'contactEmail' => $request->company['contactEmail'],
                'contactPhone' => $request->company['contactPhone'],
            ],
            ['description' => $request->company['description']]
        );

        return Vuejob::create([
            'title' => $request->title,
            'type' => $request->type,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'user_id' => 1,
            'company_id' => $company->id,
        ])->id;
    }

    public function updateJob(UpdateOrCreateRequest $request, Vuejob $job): int
    {
        $request->validated();

        $company = Company::find($job->company->id)->update([
            'name' => $request->company['name'],
            'description' => $request->company['description'],
            'contactEmail' => $request->company['contactEmail'],
            'contactPhone' => $request->company['contactPhone'],
        ]);

        if($job->update([
            'title' => $request->title,
            'type' => $request->type,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
        ])) {
            return $job->id;
        } else {
            return false;
        };
    }

    public function deleteJob(Vuejob $job)
    {
        $job->delete();
    }

}

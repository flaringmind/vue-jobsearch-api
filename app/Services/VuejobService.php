<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use stdClass;

class VuejobService
{
    public function getCompanyData(Request $request): array
    {
        return [
            'name' => $request->company['name'],
            'description' => $request->company['description'],
            'contactEmail' => $request->company['contactEmail'],
            'contactPhone' => $request->company['contactPhone'],
            'updated_at' => now(),
        ];
    }

    public function getJobData(Request $request): array
    {
        return [
            'title' => $request->title,
            'type' => $request->type,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'user_id' => 1,
            'updated_at' => now(),
        ];
    }

    public function getJobQuery(): Builder
    {
        return DB::table('vuejobs')
            ->leftJoin('companies', 'vuejobs.company_id', '=', 'companies.id')
            ->select(
                'vuejobs.*',
                'companies.name as company_name',
                'companies.description as company_description',
                'companies.contactEmail as company_contactEmail',
                'companies.contactPhone as company_contactPhone'
            );
    }

    public function formatJob(stdClass $job): array
    {
        return [
            'id' => $job->id,
            'title' => $job->title,
            'type' => $job->type,
            'description' => $job->description,
            'location' => $job->location,
            'salary' => $job->salary,
            'company' => [
                'name' => $job->company_name,
                'description' => $job->company_description,
                'contactEmail' => $job->company_contactEmail,
                'contactPhone' => $job->company_contactPhone,
            ],
        ];
    }

    public function getFormattedJob(int $id): array
    {
        $job = $this->getJobQuery()->where('vuejobs.id', $id)->first();;
        return $this->formatJob($job);
    }

    public function getFormattedJobs(): Collection
    {
        $jobs = $this->getJobQuery()->get();

        return $jobs->map(function ($job) {
            return $this->formatJob($job);
        });
    }

    public function createJob(Request $request): int
    {
        $companyId = DB::table('companies')
            ->insertGetId([
                ...($this->getCompanyData($request)),
                'created_at' => now(),
            ]);

        return DB::table('vuejobs')
            ->insertGetId([
                ...($this->getJobData($request)),
                'created_at' => now(),
                'company_id' => $companyId,
            ]);
    }

    public function updateJob(Request $request, int $id): int
    {
        $companyId = DB::table('vuejobs')->where('id', $id)->value('company_id');

        DB::table('companies')
            ->where('id', $companyId)
            ->update([
                ...($this->getCompanyData($request)),
            ]);

        return DB::table('vuejobs')
            ->where('id', $id)
            ->update([
                ...($this->getJobData($request)),
            ]);
    }

    public function deleteJob(int $id)
    {
        DB::table('vuejobs')->delete($id);
    }

}

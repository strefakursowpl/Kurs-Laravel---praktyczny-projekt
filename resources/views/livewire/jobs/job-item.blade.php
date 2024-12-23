<div class="rounded-2xl border border-light-gray p-6 xl:p-12 relative">
    <div class="grid grid-cols-1 gap-6 lg:gap-12 xl:grid-cols-[144px_1fr_144px]">
        <div class="flex size-36 items-center justify-center rounded-2xl border border-light-gray p-2">
            <img src="/storage/{{$job->logo}}" alt="{{$job->company_name}}" />
        </div>
        <div class="space-y-3">
            <div class="text-2xl font-semibold lg:text-4xl">
                {{$job->position}}
            </div>
            <x-ui.salary :salaryFrom="$job->salary_from" :salaryTo="$job->salary_to" />
            <div class="text-xl font-light lg:text-3xl">
                {{$job->company_name}}
                <div class="text-base">({{$job->location}})</div>
            </div>
        </div>
        <div class="flex flex-col justify-between">
            Przyciski...
        </div>
    </div>
</div>

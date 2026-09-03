<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $websiteRequirement = $this->routeIs('contact.store') ? 'required' : 'nullable';

        return [
            'name' => ['required', 'string', 'max:255'],
            'organization' => [$websiteRequirement, 'string', 'max:255'],
            'organization_type' => ['nullable', Rule::in(['Business', 'Manufacturing', 'Government', 'Municipality', 'Education', 'Nonprofit', 'Startup', 'Other'])],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'project_type' => [$websiteRequirement, Rule::in(['Government / Public Sector', 'Manufacturing', 'Manufacturing Software', 'Commercial Software', 'Subcontracting / Prime Contractor Partnership', 'Support / Modernization', 'Custom Software', 'Custom Software Development', 'Legacy Modernization', 'Systems Integration', 'InfinityQS / Quality Integration', 'Device / Serial Integration', 'Database & Automation', 'Automation / AI', 'Application Support', 'Other'])],
            'timeline' => [$websiteRequirement, 'string', 'max:100'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ];
    }
}

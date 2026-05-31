<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            // No unique rule: a repeated slug triggers an idempotent upsert in the controller.
            'slug' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'body' => ['required', 'string'],
            'cover_image' => ['nullable', 'string', 'max:2048'],
            // Accept either a numeric id (back-compat) or a name/slug (auto-resolved).
            'category_id' => ['nullable', 'exists:categories,id'],
            'category' => ['nullable', 'string', 'max:255'],
            // Tags may be ids or names; resolved/created in the controller.
            'tags' => ['nullable', 'array'],
            'tags.*' => ['required', 'string', 'max:255'],
            'status' => ['nullable', 'in:draft,published'],
            'featured' => ['nullable', 'boolean'],
            'publish' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
        ];
    }

    /**
     * Coerce scalar tag values to strings so numeric ids still pass the
     * string rule; the controller resolves ids vs names afterwards.
     */
    protected function prepareForValidation(): void
    {
        if (is_array($this->tags)) {
            $this->merge([
                'tags' => array_map(static fn ($t) => is_scalar($t) ? (string) $t : $t, $this->tags),
            ]);
        }
    }
}

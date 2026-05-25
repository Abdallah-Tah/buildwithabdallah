<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactMessageRequest;
use App\Http\Resources\ContactMessageResource;
use App\Models\ContactMessage;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ContactMessageController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ContactMessageResource::collection(ContactMessage::query()->latest()->paginate(25));
    }

    public function store(StoreContactMessageRequest $request): ContactMessageResource
    {
        $message = ContactMessage::query()->create($request->validated());

        return new ContactMessageResource($message);
    }
}

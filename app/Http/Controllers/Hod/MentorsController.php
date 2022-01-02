<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MentorsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::whereHas('roles', function ($mentors) {
            return $mentors->where('title', 'Mentor');
        })->with(['roles', 'department', 'media'])
            ->get();

        return view('hod.mentors.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::where('title', 'Mentor')
            ->pluck('title', 'id');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('hod.mentors.create', compact('roles', 'departments'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());


        $user->roles()->sync($request->input('roles', []));
        Password::sendResetLink($request->only(['email']));
        if ($request->input('profile_picture', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('profile_picture'))))->toMediaCollection('profile_picture');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $user->id]);
        }

        return redirect()->route('hod.mentors.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::where('title'.'Mentor')
        ->pluck('title', 'id');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $user->load('roles', 'department');

        return view('hod.mentors.edit', compact('roles', 'departments', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        if ($request->input('profile_picture', false)) {
            if (!$user->profile_picture || $request->input('profile_picture') !== $user->profile_picture->file_name) {
                if ($user->profile_picture) {
                    $user->profile_picture->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('profile_picture'))))->toMediaCollection('profile_picture');
            }
        } elseif ($user->profile_picture) {
            $user->profile_picture->delete();
        }

        return redirect()->route('hod.mentors.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'department');

        return view('hod.mentors.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

}

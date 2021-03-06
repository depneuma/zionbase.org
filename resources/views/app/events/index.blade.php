@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.events.index_title')</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="{{ __('crud.common.search') }}"
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\Event::class)
                        <a
                            href="{{ route('events.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>@lang('crud.events.inputs.rsvp_one_id')</th>
                            <th>@lang('crud.events.inputs.rsvp_two_id')</th>
                            <th>@lang('crud.events.inputs.rsvp_three_id')</th>
                            <th>@lang('crud.events.inputs.cover')</th>
                            <th>@lang('crud.events.inputs.title')</th>
                            <th>@lang('crud.events.inputs.description')</th>
                            <th>@lang('crud.events.inputs.schedule')</th>
                            <th>@lang('crud.events.inputs.venue')</th>
                            <th>@lang('crud.events.inputs.address')</th>
                            <th>@lang('crud.events.inputs.date_time')</th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                        <tr>
                            <td>
                                {{ optional($event->firstRsvp)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($event->secondRsvp)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($event->thridRsvp)->name ?? '-' }}
                            </td>
                            <td>
                                <img
                                    src="{{ $event->cover ? \Storage::url($event->cover) : '' }}"
                                    style="object-fit: cover; width: 50px; height: 50px; border: 1px solid #ccc;"
                                />
                            </td>
                            <td>{{ $event->title ?? '-' }}</td>
                            <td>{{ $event->description ?? '-' }}</td>
                            <td>{{ $event->schedule ?? '-' }}</td>
                            <td>{{ $event->venue ?? '-' }}</td>
                            <td>{{ $event->address ?? '-' }}</td>
                            <td>{{ $event->date_time ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $event)
                                    <a
                                        href="{{ route('events.edit', $event) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $event)
                                    <a
                                        href="{{ route('events.show', $event) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $event)
                                    <form
                                        action="{{ route('events.destroy', $event) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">{!! $events->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Proje Detayları</h5>
                    <div>
                        @can('update', $project)
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Düzenle
                        </a>
                        @endcan
                        @can('delete', $project)
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-danger"
                                    onclick="return confirm('Bu projeyi silmek istediğinizden emin misiniz?')">
                                <i class="fas fa-trash"></i> Sil
                            </button>
                        </form>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>{{ $project->title }}</h3>
                            <p class="text-muted">{{ $project->description }}</p>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <h5>Proje Bilgileri</h5>
                                    <table class="table">
                                        <tr>
                                            <th>Durum:</th>
                                            <td>
                                                <span class="badge bg-{{ $project->status === 'active' ? 'success' : 
                                                    ($project->status === 'completed' ? 'info' : 
                                                    ($project->status === 'cancelled' ? 'danger' : 'warning')) }}">
                                                    {{ ucfirst($project->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Öncelik:</th>
                                            <td>
                                                <span class="badge bg-{{ $project->priority === 'low' ? 'info' : 
                                                    ($project->priority === 'medium' ? 'warning' : 
                                                    ($project->priority === 'high' ? 'danger' : 'dark')) }}">
                                                    {{ ucfirst($project->priority) }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Başlangıç Tarihi:</th>
                                            <td>{{ $project->start_date->format('d.m.Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Bitiş Tarihi:</th>
                                            <td>{{ $project->end_date->format('d.m.Y') }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h5>İletişim Bilgileri</h5>
                                    <table class="table">
                                        <tr>
                                            <th>Atanan Kişi:</th>
                                            <td>{{ $project->assignedTo->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Oluşturan:</th>
                                            <td>{{ $project->createdBy->name }}</td>
                                        </tr>
                                        @if($project->customer)
                                        <tr>
                                            <th>Müşteri:</th>
                                            <td>{{ $project->customer->name }}</td>
                                        </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Görevler</h5>
                                </div>
                                <div class="card-body">
                                    @if($project->tasks->count() > 0)
                                        <div class="list-group">
                                            @foreach($project->tasks as $task)
                                                <a href="#" class="list-group-item list-group-item-action">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h6 class="mb-1">{{ $task->title }}</h6>
                                                        <small>{{ $task->due_date->format('d.m.Y') }}</small>
                                                    </div>
                                                    <p class="mb-1">{{ Str::limit($task->description, 50) }}</p>
                                                    <small>
                                                        <span class="badge bg-{{ $task->status === 'completed' ? 'success' : 
                                                            ($task->status === 'in_progress' ? 'warning' : 'secondary') }}">
                                                            {{ ucfirst($task->status) }}
                                                        </span>
                                                    </small>
                                                </a>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-muted">Bu projeye ait görev bulunmamaktadır.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
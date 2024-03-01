@extends('layouts.hero')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-8 col-sm-8">
                                        {{ __('Data KPI') }}
                                    </div>
                                    <div class="col-4 col-sm-4 d-flex justify-content-end">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            Tambah Kategori
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Kategori KPI
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('admin.kategoriKpi.store') }}" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="mb-2 row">
                                                                <label for="divisi_id" class="col-sm-3 col-form-label">Pilih
                                                                    Divisi</label>
                                                                <div class="col-sm-9">
                                                                    <select name="divisi_id" class="form-control" required>
                                                                        <option value="" selected disabled>-- PILIH --
                                                                        </option>
                                                                        @foreach ($divisi as $item)
                                                                            <option value="{{ $item->id }}">
                                                                                {{ $item->nama_divisi }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label for="nama_kpi" class="col-sm-3 col-form-label">Beri
                                                                    Judul</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control"
                                                                        name="nama_kpi" required>
                                                                </div>
                                                            </div>
                                                            <!-- Pertanyaan Fields -->
                                                            @for ($i = 1; $i <= 12; $i++)
                                                                <div class="mb-2 row">
                                                                    <label for="pertanyaan{{ $i }}"
                                                                        class="col-sm-3 col-form-label">Pertanyaan
                                                                        {{ $i }}</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text"
                                                                            name="pertanyaan{{ $i }}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            @endfor
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($kategori as $item)
                                        <div class="col-sm-6 col-md-3">
                                            <div class="card card-stats card-success card-round">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <div class="icon-big text-center">
                                                                <i class="flaticon-analytics"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col col-stats">
                                                            <div class="numbers">
                                                                <p class="card-category">{{ $item->divisi->nama_divisi }}
                                                                </p>
                                                                <div class="d-flex flex-nowrap">
                                                                    <button type="button" class="btn btn-sm btn-info"
                                                                        data-toggle="modal"
                                                                        data-target="#modal{{ $item->id }}">
                                                                        <i class="fas fa-eye"></i>
                                                                    </button>
                                                                    <form
                                                                        action="{{ route('admin.kategoriKpi.destroy', $item->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-danger"><i
                                                                                class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ $item->divisi->nama_divisi }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('admin.kategoriKpi.update', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="modal-body">
                                                            <div class="mb-2">
                                                                <label for="divisi_id">Pilih Divisi</label>
                                                                <select name="divisi_id" class="form-control" required>
                                                                    @if ($item->divisi)
                                                                        <option value="{{ $item->divisi_id }}" selected>
                                                                            {{ $item->divisi->nama_divisi }}
                                                                        </option>
                                                                    @else
                                                                        <option value="" disabled selected>Select
                                                                            Divisi</option>
                                                                    @endif

                                                                    @foreach ($divisi as $div)
                                                                        <option value="{{ $div->id }}">
                                                                            {{ $div->nama_divisi }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="mb-2">
                                                                <label for="nama_kpi">Beri Judul</label>
                                                                <input type="text" class="form-control"
                                                                    name="nama_kpi" value="{{ $item->nama_kpi }}"
                                                                    required>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="pertanyaan1">Pertanyaan 1 </label>
                                                                <input type="text" class="form-control"
                                                                    name="pertanyaan1" value="{{ $item->pertanyaan1 }}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="pertanyaan2">Pertanyaan 2 </label>
                                                                <input type="text" class="form-control"
                                                                    name="pertanyaan2" value="{{ $item->pertanyaan2 }}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="pertanyaan3">Pertanyaan 3 </label>
                                                                <input type="text" class="form-control"
                                                                    name="pertanyaan3" value="{{ $item->pertanyaan3 }}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="pertanyaan4">Pertanyaan 4 </label>
                                                                <input type="text" class="form-control"
                                                                    name="pertanyaan4" value="{{ $item->pertanyaan4 }}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="pertanyaan5">Pertanyaan 5 </label>
                                                                <input type="text" class="form-control"
                                                                    name="pertanyaan5" value="{{ $item->pertanyaan5 }}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="pertanyaan6">Pertanyaan 6 </label>
                                                                <input type="text" class="form-control"
                                                                    name="pertanyaan6" value="{{ $item->pertanyaan6 }}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="pertanyaan7">Pertanyaan 7 </label>
                                                                <input type="text" class="form-control"
                                                                    name="pertanyaan7" value="{{ $item->pertanyaan7 }}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="pertanyaan8">Pertanyaan 8 </label>
                                                                <input type="text" class="form-control"
                                                                    name="pertanyaan8" value="{{ $item->pertanyaan8 }}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="pertanyaan9">Pertanyaan 9 </label>
                                                                <input type="text" class="form-control"
                                                                    name="pertanyaan9" value="{{ $item->pertanyaan9 }}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="pertanyaan10">Pertanyaan 10 </label>
                                                                <input type="text" class="form-control"
                                                                    name="pertanyaan10"
                                                                    value="{{ $item->pertanyaan10 }}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="pertanyaan11">Pertanyaan 11 </label>
                                                                <input type="text" class="form-control"
                                                                    name="pertanyaan11"
                                                                    value="{{ $item->pertanyaan11 }}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="pertanyaan12">Pertanyaan 12 </label>
                                                                <input type="text" class="form-control"
                                                                    name="pertanyaan12"
                                                                    value="{{ $item->pertanyaan12 }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Karyawan</th>
                                                <th>Divisi</th>
                                                <th>Total Nilai</th>
                                                <th>Adjusments</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kpi as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->user ? $data->user->name : 'User Not Available' }}</td>
                                                    <td>
                                                        @if ($data->user && $data->user->divisi)
                                                            {{ $data->user->divisi->nama_divisi }}
                                                        @else
                                                            User or Divisi Not Available
                                                        @endif
                                                    </td>
                                                    <td>{{ $data->total_nilai }}</td>
                                                    <td>
                                                        @if($data->adjustments == "Sangat Baik")
                                                            <button class="btn btn-success">
                    											<span class="btn-label">
                    												<i class="fa fa-check"></i>
                    											</span>
                    											Sangat Baik
                    										</button>
                                                        @endif
                                                    </td>
                                                    <td class="text-center text-nowrap">
                                                        <form action="{{ route('admin.kpi.destroy', $data->id) }}" method="post">
                                                            @csrf
                                                            @method('delete') {{-- Change method to DELETE --}}
                                                            <a href="{{ route('admin.kategoriKpi.edit', $data->user_id) }}"
                                                                class="btn btn-sm btn-warning">Edit</a>
                                                            <button type="submit" id="alert_demo_3_4"
                                                                class="btn btn-sm btn-danger">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

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
                                        {{ __('Edit Shiff Karyawan') }}
                                    </div>
                                    <div class="col-4 col-sm-4 d-flex justify-content-end">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <form action="{{ route('shiff.update', $shiff->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="largeInput">Nama Karyawan</label>
                                                <select class="form-control form-control" name="user_id" id="largeSelect"
                                                    @readonly(true)>
                                                    <option value="{{ $shiff->user_id }}">{{ $shiff->user->name }}</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="defaultSelect">SHIFF Karyawan</label>
                                                <select name="shiff" id="shiff" class="form-control" required>>
                                                    <option selected value="{{ $shiff->shiff }}">
                                                        @if ($shiff->shiff == 0)
                                                            PAGI
                                                        @elseif ($shiff->shiff == 1)
                                                            SORE
                                                        @else
                                                            Other Value
                                                        @endif
                                                    </option>
                                                    <option value="0">PAGI</option>
                                                    <option value="1">SORE</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-action">
                                            <button type="submit" class="btn btn-success w-100">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

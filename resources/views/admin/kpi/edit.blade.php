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
                                        {{ __('Detail KPI') }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- @foreach ($kpi as $kategori_kpi) --}}
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label for="">Nama User</label>
                                            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                                        </div>
                                        <table class="table table-hover table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Indikator Penelitian
                                                    </th>
                                                    <th>Nilai</th>
                                                </tr>
                                            </thead>
                                            @foreach ($kategori as $item)
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>{{ $item->pertanyaan1 }}
                                                        </td>
                                                        <td><input type="text" name="nilai1" class="form-control"
                                                                id="nilai" value="{{ $kpi->nilai1 }}" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>{{ $item->pertanyaan2 }}
                                                        </td>
                                                        <td><input type="text" name="nilai2" class="form-control"
                                                                id="nilai" value="{{ $kpi->nilai2 }}" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>{{ $item->pertanyaan3 }}
                                                        </td>
                                                        <td><input type="text" name="nilai3" class="form-control"
                                                                id="nilai" value="{{ $kpi->nilai3 }}" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>{{ $item->pertanyaan4 }}
                                                        </td>
                                                        <td><input type="text" name="nilai4" class="form-control"
                                                                id="nilai" value="{{ $kpi->nilai4 }}" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>{{ $item->pertanyaan5 }}
                                                        </td>
                                                        <td><input type="text" name="nilai5" class="form-control"
                                                                id="nilai" value="{{ $kpi->nilai5 }}" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>{{ $item->pertanyaan6 }}
                                                        </td>
                                                        <td><input type="text" name="nilai6" class="form-control"
                                                                id="nilai" value="{{ $kpi->nilai6 }}" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>{{ $item->pertanyaan7 }}
                                                        </td>
                                                        <td><input type="text" name="nilai7" class="form-control"
                                                                id="nilai" value="{{ $kpi->nilai7 }}" readonly>
                                                        </td>
                                                    </tr>
                                                    @if (empty($item->pertanyaan8))
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <input type="hidden" name="nilai18"
                                                                    class="form-control inputan" id="nilai"
                                                                    value="0">
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>8</td>
                                                            <td>{{ $item->pertanyaan8 }}
                                                            </td>
                                                            <td><input type="text" name="nilai8" class="form-control"
                                                                    id="nilai" value="{{ $kpi->nilai8 }}" readonly>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if (empty($item->pertanyaan9))
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <input type="hidden" name="nilai9"
                                                                    class="form-control inputan" id="nilai"
                                                                    value="0">
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>9</td>
                                                            <td>{{ $item->pertanyaan9 }}
                                                            </td>
                                                            <td><input type="text" name="nilai9" class="form-control"
                                                                    id="nilai" value="{{ $kpi->nilai9 }}" readonly>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if (empty($item->pertanyaan10))
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <input type="hidden" name="nilai10"
                                                                    class="form-control inputan" id="nilai"
                                                                    value="0">
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>10</td>
                                                            <td>{{ $item->pertanyaan10 }}
                                                            </td>
                                                            <td><input type="text" name="nilai10" class="form-control"
                                                                    id="nilai" value="{{ $kpi->nilai10 }}" readonly>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if (empty($item->pertanyaan11))
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <input type="hidden" name="nilai11"
                                                                    class="form-control inputan" id="nilai"
                                                                    value="0">
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>11</td>
                                                            <td>{{ $item->pertanyaan11 }}
                                                            </td>
                                                            <td><input type="text" name="nilai11" class="form-control"
                                                                    id="nilai" value="{{ $kpi->nilai11 }}" readonly>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if (empty($item->pertanyaan12))
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <input type="hidden" name="nilai12"
                                                                    class="form-control inputan" id="nilai"
                                                                    value="0">
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>12</td>
                                                            <td>{{ $item->pertanyaan12 }}
                                                            </td>
                                                            <td><input type="text" name="nilai12" class="form-control"
                                                                    id="nilai" value="{{ $kpi->nilai12 }}" readonly>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><input type="hidden" class="form-control inputan"
                                                                id="total_nilai_nol">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#</td>
                                                        <td><b>TOTAL NILAI</b></td>
                                                        <td><input type="text" name="total_nilai" class="form-control"
                                                                id="total_nilai" value="{{ $kpi->total_nilai }}"
                                                                readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#</td>
                                                        <td><b>NILAI AKHIR</b></td>
                                                        <td><input type="text" name="nilai_akhir" class="form-control"
                                                                id="nilai_akhir" value="{{ $kpi->total_nilai }}"
                                                                readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#</td>
                                                        <td><b>ADJUSTMENT</b></td>
                                                        <td><input type="text" name="adjustments" class="form-control"
                                                                id="adjustments" value="{{ $kpi->adjustments }}"
                                                                readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#</td>
                                                        <td><b>PERSEN %</b></td>
                                                        <td><input type="text" name="persen" class="form-control"
                                                                id="persen" value="{{ $kpi->persen }}" readonly>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                    </form>
                                </div>
                                {{-- @endforeach --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

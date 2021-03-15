@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Conditionals (if-elseif-else)</h2>
                @php $color = 'danger'; @endphp
                @if ($color == 'danger')
                    <div class="alert alert-danger">
                        {{ $color }}
                    </div>
                @elseif ($color == 'success')
                    <div class="alert alert-success">
                        {{ $color }}
                    </div>
                @else 
                    <div class="alert alert-warning">
                        {{ $color }}
                    </div>
                @endif
                <h2>Switch</h2>
                @php $nmonth = date('n'); @endphp
                @switch($nmonth)
                    @case(1)
                        <button class="btn btn-outline-dark">
                            January
                        </button>
                        @break
                    @case(2)
                        <button class="btn btn-outline-dark">
                            Febreary
                        </button>
                        @break
                    @case(3)
                        <button class="btn btn-outline-dark">
                            March
                        </button>
                        @break
                    @case(4)
                        <button class="btn btn-outline-dark">
                            April
                        </button>
                        @break
                    @case(5)
                        <button class="btn btn-outline-dark">
                            May
                        </button>
                        @break
                    @case(6)
                        <button class="btn btn-outline-dark">
                            June
                        </button>
                        @break
                    @default
                        <button class="btn btn-outline-dark">
                            July - August - September - October - November - December
                        </button>
                        @break
                @endswitch
                <h2>Loop (for)</h2>
                <ul class="pagination justify-content-center">
                @for ($i = 1; $i <= 20; $i++)
                    <li class="page-item">
                        <a href="" class="page-link">{{ $i  }}</a>
                    </li>    
                @endfor
                </ul>
            </div>
        </div>
    </div>
@endsection
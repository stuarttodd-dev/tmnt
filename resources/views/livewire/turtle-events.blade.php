<div class="container px-4 px-lg-5">
    @if(!empty($eventLogs))
        <div class="row">
            <h4 class="text-white">Events</h4>
        </div>
        @foreach($eventLogs as $eventLog)
        <div class="row">
            <div class="card h-20">
                <div class="row">
                    <div class="col-2 ">
                        <img src="{{ asset('img/' . $eventLog['turtle']['avatar']) }}" alt="{{ $eventLog['turtle']['name']}}"
                             title="{{ $eventLog['turtle']['name']}}"
                             class="img-fluid card-img-top"
                        />
                    </div>
                    <div class="col-10 pt-3 align-middle h-20">
                        <h4>{{ $eventLog['log'] }}</h4>
                        <table class="table">
                            <tr>
                                <td>Name:</td>
                                <td>{{ $eventLog['turtle']['name'] }}</td>
                            </tr>
                            <tr>
                                <td>Description:</td>
                                <td>{{ $eventLog['turtle']['description'] }}</td>
                            </tr>
                            <tr>
                                <td>HP:</td>
                                <td>{{ $eventLog['turtle']['health_points'] > 0 ? $eventLog['turtle']['health_points'] : 0 }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>

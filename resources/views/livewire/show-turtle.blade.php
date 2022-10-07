<div class="article-container shadow-card transition duration-150 ease-in rounded-xl flex cursor-pointer">
    <div class="flex flex-col md:flex-row flex-1 px-2 py-6">
        <div class="w-full flex flex-col justify-between mx-2 md:mx-4">
            <img src="{{ asset( 'img/' . $turtle['avatar']) }}" alt="{{ $turtle['name'] }}" title="{{ $turtle['name'] }}" class="w-20"/>
            <h4 class="text-xl font-semibold mt-2 md:mt-0">
                {{ $turtle['name'] }} ({{ $turtle['health_points'] }} HP)
            </h4>
            <div class="mt-3">
                {{ $turtle['description'] }}
            </div>
            <div class="mt-3">
                <h4 class="text-xl font-semibold mt-2 md:mt-0">Default Attack</h4>
                <p>{{ $turtle['default_attack'] }}</p>
            </div>
            <div class="mt-3">
                <h4 class="text-xl font-semibold mt-2 md:mt-0">Default Damage Reaction</h4>
                @if(!empty($turtle['default_damage_reaction']))
                    <ul>
                        @foreach($turtle['default_damage_reaction'] as $eventLog)
                            @foreach($eventLog as $reaction)
                                @if(!is_array($reaction))
                                    <li>{{ $reaction }}</li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                @else
                    <p>N/A</p>
                @endif
            </div>
        </div>
    </div>
</div>

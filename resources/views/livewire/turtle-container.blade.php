@if($healthPoints > 0)
<div class="turtle-container col-md-3 mb-5">
    <div class="card h-100">
        <img src="{{ asset('img/' . $avatar) }}" alt="{{ $name }}" title="{{ $name }}" class="img-fluid card-img-top"/>
        <div class="card-body {{ $classes }}">
            <h4 class="card-title text-white-50">{{ $name }}</h4>
            <p class="card-text text-white-50"><b>({{ $healthPoints > 0 ? $healthPoints : 0 }} HP)</b></p>
            <p class="card-text text-white-50">{{ $description }}</p>
        </div>
        <div class="card-footer">
            <button type="button" wire:click="updateObserver('FeelSorryForYourselfObserver')" class="btn btn-outline-secondary {{ in_array('FeelSorryForYourselfObserver', $reactions) ? 'bg-black' : '' }}" title="Feel Unhappy">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-emoji-frown" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path
                        d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                </svg>
                <span class="visually-hidden">Button</span>
            </button>
{{--            <button wire:click="$emit('increment2')">test {{ $count }}</button>--}}
            <button type="button" wire:click.prevent="updateObserver('EatPizzaObserver')" class="btn btn-outline-secondary {{ in_array('EatPizzaObserver', $reactions) ? 'bg-black' : '' }}" title="Eat Pizza">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-egg-fried" viewBox="0 0 16 16">
                    <path d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                    <path
                        d="M13.997 5.17a5 5 0 0 0-8.101-4.09A5 5 0 0 0 1.28 9.342a5 5 0 0 0 8.336 5.109 3.5 3.5 0 0 0 5.201-4.065 3.001 3.001 0 0 0-.822-5.216zm-1-.034a1 1 0 0 0 .668.977 2.001 2.001 0 0 1 .547 3.478 1 1 0 0 0-.341 1.113 2.5 2.5 0 0 1-3.715 2.905 1 1 0 0 0-1.262.152 4 4 0 0 1-6.67-4.087 1 1 0 0 0-.2-1 4 4 0 0 1 3.693-6.61 1 1 0 0 0 .8-.2 4 4 0 0 1 6.48 3.273z"></path>
                </svg>
                <span class="visually-hidden">Button</span>
            </button>
            <button type="button" wire:click.prevent="updateObserver('RetreatObserver')" class="btn btn-outline-secondary {{ in_array('RetreatObserver', $reactions) ? 'bg-black' : '' }}" title="Retreat">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-fast-forward" viewBox="0 0 16 16">
                    <path
                        d="M6.804 8 1 4.633v6.734L6.804 8Zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C.713 12.69 0 12.345 0 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692Z"/>
                    <path
                        d="M14.804 8 9 4.633v6.734L14.804 8Zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C8.713 12.69 8 12.345 8 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692Z"/>
                </svg>
                <span class="visually-hidden">Button</span>
            </button>
            <button type="button" wire:click.prevent="updateObserver('CounterAttackObserver')" class="btn btn-outline-secondary {{ in_array('CounterAttackObserver', $reactions) ? 'bg-black' : '' }}" title="Counter attack">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-arrow-left-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                </svg>
                <span class="visually-hidden">Button</span>
            </button>
            <hr/>
            <a class="btn btn-primary btn-sm" href="#!" wire:click.prevent="damage">Damage</a>
            <a class="btn btn-primary btn-sm" href="#!" wire:click.prevent="attack">Attack</a>
        </div>
    </div>
</div>
@endif

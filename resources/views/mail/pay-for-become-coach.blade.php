<div class="message">
    <h4>{{ __('Hi') }} ,</h4>
    <p>{{$instructor->name}}</p>

    <h4>{{ __('Thank you for Send Request to be a coach in Daeem') }}</h4>
    <br>
    <a href="{{$link}}" class="btn btn-info">{{ __('Click here to go to pay page') }}</a>
    <br>
    <p>
        <b>The {{get_option('app_name')}} Team</b>
    </p>
</div>

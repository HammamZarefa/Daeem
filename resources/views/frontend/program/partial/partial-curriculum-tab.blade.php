<div class="tab-pane fade" id="Curriculum" role="tabpanel" aria-labelledby="Curriculum-tab">
    <div class="curriculum-content">
        <div class="accordion" id="accordionExample">
            @forelse(@$course->programSessions as $key => $lesson)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $key }}">
                        <button class="accordion-button font-medium font-18 {{ $key == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="{{ $key == 0 ? 'true' : 'false' }}" aria-controls="collapseOne">
                            {{ __($lesson->class_topic) }}
                        </button>
                    </h2>
                    <div id="collapse{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="play-list">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('Topic') }}</th>
                                        <th scope="col">{{ __('Date & Time') }}</th>
                                        <th scope="col">{{ __('Time Duration') }}</th>
                                        <th scope="col">{{ __('Session Type') }}</th>
                                        <th scope="col">{{$lesson->session_type == 1 ? __('Meeting Host Name') : __('Description')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ Str::limit($lesson->class_topic, 50) }}</td>
                                            <td>{{ date('d M Y, H:i:s', strtotime(@$lesson->date)) }}</td>
                                            <td>{{ $lesson->duration }} minutes</td>
                                            <td>{{ $lesson->session_type == 1 ?  __('LIVE')  : __('ONSITE') }}</td>
                                            <td>
                                                @if($lesson->session_type == 1 )
                                                @if($lesson->meeting_host_name == 'zoom')
                                                    Zoom
{{--                                                    <button--}}
{{--                                                        class="theme-btn theme-button1 green-theme-btn default-hover-btn viewMeetingLink"--}}
{{--                                                        data-item="{{ $lesson }}">--}}
{{--                                                        {{ __('View') }}--}}
{{--                                                    </button>--}}
                                                @elseif($lesson->meeting_host_name == 'bbb')
                                                    BigBlueButton
{{--                                                    <button--}}
{{--                                                        class="theme-btn theme-button1 green-theme-btn default-hover-btn viewBBBMeetingLink"--}}
{{--                                                        data-item="{{ $lesson }}"--}}
{{--                                                        data-route="{{ route('instructor.join-bbb-meeting', $lesson->id) }}">--}}
{{--                                                        {{ __('View') }}--}}
{{--                                                    </button>--}}
                                                @elseif($lesson->meeting_host_name == 'jitsi')
                                                    Jitsi
{{--                                                    <button--}}
{{--                                                        class="theme-btn theme-button1 green-theme-btn default-hover-btn viewJitsiMeetingLink"--}}
{{--                                                        data-item="{{ $lesson }}"--}}
{{--                                                        data-route="{{ route('join-jitsi-meeting', $lesson->uuid) }}">--}}
{{--                                                        {{ __('View') }}--}}
{{--                                                    </button>--}}
                                                @elseif($lesson->meeting_host_name == 'gmeet')
                                                    Gmeet
{{--                                                    <button--}}
{{--                                                        class="theme-btn theme-button1 green-theme-btn default-hover-btn viewGmeetMeetingLink"--}}
{{--                                                        data-url="{{ $lesson->join_url }}">--}}
{{--                                                        {{ __('View') }}--}}
{{--                                                    </button>--}}
                                                @endif
                                                @else
                                                    {{$lesson->description}}
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Note End-->
                                <!-- If User Logged In then add Class Name in play-list-item = "venobox"-->
                                <!-- If Preview has for this course add Class Name in play-list-item = "preview-enabled"-->
                                <!-- Note Start-->





                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row">
                    <p>{{ __('No Data Found') }}!</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
